#!/usr/bin/perl -w
#
# FAST N FURIOUS DTDNS UPDATER
# DtDNS update script, coded by alcarlosse
#
# Written according to the specifications
#  for an update client of DtDNS.

# generally a good (but nerve-breaking) idea
use strict;

# modules needed
use LWP::Simple;
use Time::localtime;

# sub declarations
sub request_update();

# general almost static data
our $version = "1.3";
our $clientname = "FastnFurious$version";

# possible request responses from dtDNS server
# plus an informal one, adding to program functionality (the first)
our @request_response_db = ("No hostname to update was supplied.", "No password was supplied.",
			"The hostname you supplied is not valid.", "The password you supplied is not valid.",
			"This account has not yet been activated.", "Administration has disabled this account.",
			"Illegal character in IP.");

# do declerations for 'use strict'
my ($i, $dt, @id, @ip, @pw, $startup_msg,
	@localip, @newlocalip, @tmp, @tmp2);

# usage information and help text
die "Fast n Furious DtDNS updater v$version by alcarlosse.

	usage: $0 [-d<time>] <domainname>:<password>:[<IP>]
	
	<domainname> is a virtual domain name you own on DtDNS (eg. blah.dtdns.com).
	<password> is the password of the user that owns the domain name on DtDNS.
	[IP] optionally specifies the IP for the host to point to
		If not specified, the IP of this machine will be used
		If set to 0.0.0.0 the host will be visible as offline
		You can specify multiple domain name / password / IP trios seperated
			by a semicolon (;). You need to specify the password for every
			domain name though.
	[-d<time>] sets the script to daemonize itself and update the host every
		<time> minutes. If IP is not specified, it will only update the
		domain name if the IP has changed in that interval.
" if (@ARGV && ($ARGV[0] eq '-h' || $ARGV[0] eq '--help'));

die "usage: $0 <domainname>:<password>:[<IP>] [-d<time>]\n" unless (@ARGV > 0 && @ARGV < 3);

# store arguments
if ($ARGV[0] =~ /-d/){
	$dt = substr($ARGV[0], 2);
	
	@tmp = split /;/, $ARGV[1];
	for($i = 0; $i < @tmp; $i++){
		@tmp2 = split /:/, $tmp[$i];
		$id[$i] = $tmp2[0];
		$pw[$i] = $tmp2[1];
		$ip[$i] = $tmp2[2];
	}
} elsif (@ARGV == 1 || $ARGV[1] =~ /-d/) {
	$dt = substr($ARGV[1], 2) if ($ARGV[1]);

	@tmp = split /;/, $ARGV[0];
	for($i = 0; $i < @tmp; $i++){
		@tmp2 = split /:/, $tmp[$i];
		$id[$i] = $tmp2[0];
		$pw[$i] = $tmp2[1];
		$ip[$i] = $tmp2[2];
	}
}


# reset $0, cause any user can ps aux
# and see arguments, thus password too
# security bug pointed out by a buddy, hkvig
$0 = "Fast n Furious v$version";

# print a startup msg with some info
$startup_msg = "[FnF] (" . ctime() . "): Fast n Furious DtDNS updater v$version started!\n\t\t\t\t  Request IP Update for " . @id . " host(s).";

print "$startup_msg\n\n";

# i'm using the url given by DtDNS to
# find out my ip, cause it is supposed
# to override any problems caused by
# hardware/software in a network
for($i = 0; $i < @tmp; $i++){
	$localip[$i] = get("http://myip.dtdns.com");
}

# request update once, no matter what
for($i = 0; $i < @tmp; $i++){
	&request_update($id[$i], $pw[$i], $ip[$i]);
}

# request updates
# daemonized mode
while ($dt){
	# wait $dt minutes
	sleep($dt * 60);

	# if ip was specified and we got daemonization
	# update it every so
	# if ip was not specified and we need to update
	# ip to the localhost, check if ip has changed
	# since last time, to avoid spamming the server
	for($i = 0; $i < @tmp; $i++){
		if($ip[$i]){
			&request_update($id[$i], $pw[$i], $ip[$i]);
		} else {
			$newlocalip[$i] = get("http://myip.dtdns.com");
			if($localip[$i] ne $newlocalip[$i]){
				&request_update($id[$i], $pw[$i], $ip[$i]);
				$localip[$i] = $newlocalip[$i];
			} else {
				print "[FnF] (" . ctime() . "): Update request not sent for $id[$i]. Local IP has not changed.\n";
			}
		}
	}
}






#############################
## Subs used in the script ##
#############################

# request response database

# sub to request an ip update
sub request_update(){
	my ($id, $pw, $ip) = @_;
	my ($request_report, $request_response, $j);
	
	print "[FnF] (" . ctime(). "): Sending update request for $id[$i].\n";
	
	# send request, with or without ip supplied
	if ($ip){
		$request_response = get("http://www.dtdns.com/api/autodns.cfm?id=$id&pw=$pw&ip=$ip&client=$clientname");
	} else {
		$request_response = get("http://www.dtdns.com/api/autodns.cfm?id=$id&pw=$pw&client=$clientname");
	}
	
	# analyze response

	$request_report = $request_response;

	# get around a warning
	$request_response = "" unless($request_report);
	
	for ($j = 0; $j < @request_response_db; $j++){
		$request_report = $request_response_db[$j] if ($request_response =~ /$request_response_db[$j]/i);
	}
	
	$request_report = "Update Failed!" unless($request_report);
	print "[FnF] (" . ctime(). "): Request update sent.\n\t\t\t\t  Response: $request_report\n";
}
