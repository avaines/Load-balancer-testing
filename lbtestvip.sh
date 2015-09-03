#
#  .SYNOPSIS
#  Continually pole a given url for a given number of epochs, the URL is assumed to be presenting the loadbalancer.php
#
#  .EXAMPLE
#	update the "vip" variable at the bottom of this file and execute from a linux box (you will need sudo
#  ./lbtestvip.sh
#
#  .NOTES
#  	Author: Aiden Vaines
#	Date: 20/4/2015
#	Email: aiden@vaines.org
#

function checksites {
	echo "Checking sites in order: "
	printf "%s\n" "${vip[@]}"
	echo

	#loop through the list of URLs below
	for i in "${vip[@]}"
	do 
		#Clear result array
		VSERVER=()
		POOL=()
		CLIENTIP=()
		CLIENTXFWD=()
		URI=()
		
		#Start the table
		echo
		echo
		echo "Site: "  $i
		echo -e "POOL \t\t\t CLIENT-IP \t\t CLIENT X-FWD \t\t URI"
		echo -e "---- \t\t\t --------- \t\t ------------- \t\t ---"
		
		#request the url the number of times specified (epochs) after resetting the counter
		COUNTER=0	
		while [ $COUNTER -lt $epoch ]; do
			#hold the whole result in variable $RESULT
			RESULT="$(curl --silent -k $i/?return=script)"
		
			#use grep to filter $RESULT based on requirement
			POOL+=($(echo ${RESULT} | grep -P -o '(?<=STARTPOOLMBR)(.*)(?=ENDPOOLMBR)'))
			CLIENTIP+=($(echo ${RESULT} | grep -P -o '(?<=STARTCLIIP)(.*)(?=ENDCLIIP)'))
			CLIENTXFWD+=($(echo ${RESULT} | grep -P -o '(?<=STARTXFWD)(.*)(?=ENDXFWD)'))
			URI+=($(echo ${RESULT} | grep -P -o '(?<=STARTVSERVER)(.*)(?=ENDVSERVER)' | sed "s/?return=script//g")) #remove the HTTP GET from the URI
			
			let COUNTER=COUNTER+1 
			#sleep 2
			done

		for ((i=0;i<$epoch;i++));
		do	
			echo -e ${POOL[$i]} "\t" ${CLIENTIP[$i]} "\t" ${CLIENTXFWD[$i]} "\t" ${URI[$i]}
		done
			
		#read -p "Press [Enter] key for next..."
	done
}


#
#Number of epochs per site:
epoch=3

#List of IPs/URLs to check:
vip=("192.168.199.2" "192.168.199.3")


#Execute checks
checksites $vip
