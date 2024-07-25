var t1=document.getElementById("t1");
var result1=document.getElementById("result1");
var limit1=50;
result1.textContent=0+"/"+limit1;

["click","input"].forEach((event)=>
{
t1.addEventListener(event,count1)
})
	
function count1()
{
	var textLength1=t1.value.length;
	result1.textContent= textLength1+"/"+limit1;
}


var t2=document.getElementById("t2");
var result2=document.getElementById("result2");
var limit2=250;
result2.textContent=0+"/"+limit2;

["click","input"].forEach((event)=>
{
t2.addEventListener(event,count2)
})
	
function count2()
{
	var textLength2=t2.value.length;
	result2.textContent= textLength2+"/"+limit2;
}