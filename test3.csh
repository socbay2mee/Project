#! /bin/csh
set bien=$argv 
if ($#argv == 0) then
	echo "warning"	 
else if ("$bien" =~ [0-9][0-9][0-9][0-9]) then
	set uid=`awk '{print$2}' data|grep $argv`
	if ($bien == $uid) then 
		echo `grep $argv data`
	else
		echo " so uid khong co trong danh sach"
	endif
else
	set ten=`awk '{print$3}' data|grep ^$argv`
	if ("$ten" =~ [a-z]*) then
		awk '{print$3,$2,$4,$5}' data | grep ^$argv>data1
		awk '{print NR "   " $1}' data1
		awk '{print NR "   " $0}' data1>data2 
		set nhap=$<
		set sothutu=`awk '{print$1}' data2|grep $nhap`
		if ($nhap == $sothutu) then
			grep ^$sothutu data2	
		else 
			echo nhap sai so roi
		endif	
	else 
		echo "nhap sai"
	endif	
endif		

