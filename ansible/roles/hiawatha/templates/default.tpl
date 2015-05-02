# VARIABLES
# Here we can set persistent variables.
Set LOCALHOST = 127.0.0.0/8
Set LAN = 192.168.20.0/24
Set WLAN = 172.16.1.0/24

# GENERAL SETTINGS
#
ServerString = Hiawatha
ServerId = www-data
ConnectionsTotal = 10000
ConnectionsPerIP = 10000
SystemLogfile = /var/log/hiawatha/system.log
GarbageLogfile = /var/log/hiawatha/garbage.log
CacheSize = 100

Binding {
Port = 80
MaxRequestSize = 2048
}


Hostname = 192.168.20.30
WebsiteRoot = /srv
StartFile = index.php
TimeForCGI = 20
UseFastCGI = php5-fpm

VirtualHost {
Hostname = team-nfc.dev, www.team-nfc.dev
WebsiteRoot = /srv/public

EnforceFirstHostname = yes

UseToolkit = sitetoolkit

#AccessLogFile = /srv/logs/access.log, daily
#ErrorLogFile = /srv/logs/error.log

StartFile = index.php
TimeForCGI = 20
UseFastCGI = php5-fpm

PreventXSS = yes
PreventCSRF = yes
RandomHeader = 128

UseGZFile = yes

# Avoids potential problems as we're also sending gzipped content
CustomHeader = Vary: Accept-Encoding

}


FastCGIserver {
    FastCGIid = php5-fpm
    ConnectTo = /var/run/php5-fpm.sock
    Extension = php
}


UrlToolkit {
ToolkitID = sitetoolkit

RequestURI exists Return
Match .* Rewrite /index.php
}