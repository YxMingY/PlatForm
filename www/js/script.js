function cleararea(owner){
	ele = document.getElementById("text");
	ele.style.color = "rgba(0,0,0,0.5)";
	ele.value = "输入你的内容";
	owner.innerHTML = ">_<没有吃的";
}
function focusinput(ele){
	text = ele.value;
	if(text == "输入你的内容") {
		ele.value = "";
		ele.style.color = "#000";
		document.getElementById("clear").innerHTML = "↓吃掉↓";
	}else if(text == "") {
		ele.style.color = "rgba(0,0,0,0.5)";
		ele.value = "输入你的内容";
		document.getElementById("clear").innerHTML = ">_<没有吃的";
	}else{
		ele.style.color = "#000";
	}
}
