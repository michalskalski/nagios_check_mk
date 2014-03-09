#!/usr/bin/env ruby
#
# Local check_mk/nagios check for pdns.
# Retrive data from internal webserver of pdns
# 
# Example of declaration in mrpe.cfg:
#    Pdns  pdns_stats.rb http://127.0.0.1:8081 admin PASSWORD 100 200
#
# Test if average number of queries per second in one minute window 
# is on warning or critical level
#
# If not work uncomment debug lines, and check mech.log
#
# Author: Michal Skalski <michal@skalski.org>

require 'rubygems'
require 'mechanize'

## Debug
#require 'logger'


uri = ARGV[0]
username = ARGV[1]
password = ARGV[2]
warn = ARGV[3].to_i
crit = ARGV[4].to_i


agent = Mechanize.new
## Debug
#agent.log = Logger.new "mech.log"

agent.add_auth(uri,username, password)

page = agent.get(uri)

#Uptime, Queries/Second averages
a = page.search(".//body/br[1]/preceding-sibling::text()[1]").text.scan(/\d+(?:\.\d+)?/)
uptime = a[0]
qmin1 = a[4]
qmin5 = a[5]
qmin10 = a[6]

#Cache hitrate averages (%)
a = page.search(".//body/br[2]/preceding-sibling::text()[1]").text.scan(/\d+(?:\.\d+)?/)
chit1 = a[3]
chit5 = a[4]
chit10 = a[5]

#Backend query cache hitrate averages (%)
a = page.search(".//body/br[3]/preceding-sibling::text()[1]").text.scan(/\d+(?:\.\d+)?/)
bqchit1 = a[3]
bqchit5 = a[4]
bqchit10 = a[5]

#Backend query load averages
a = page.search(".//body/br[4]/preceding-sibling::text()[1]").text.scan(/\d+(?:\.\d+)?/)
bql1 = a[3]
bql5 = a[4]
bql10 = a[5]

#Question/answer latency (ms)
a = page.search(".//body/br[4]/following-sibling::text()[1]").text.scan(/\d+(?:\.\d+)?/)
latency = a[1]

# performance data 
performance_data = "uptime=#{uptime} avgquery1=#{qmin1} avgquery5=#{qmin5} avgquery10=#{qmin10} cachehit1=#{chit1}% cachehit5=#{chit5}% cachehit10=#{chit10}% backcachehit1=#{bqchit1}% backcachehit5=#{bqchit5}% backcachehit10=#{bqchit10}% backqload1=#{bql1} backqload5=#{bql5} backqload10=#{bql10} latency=#{latency}ms"

if qmin1.to_f > crit
  puts "Critical: #{qmin1} qps | #{performance_data}" 
  exit(2)
elsif qmin1.to_f > warn
  puts "Warning: #{qmin1} qps | #{performance_data}"
  exit(1)
else
  puts "OK: #{qmin1} qps | #{performance_data}"
  exit(0)
end
