var W3CDOM = (document.createElement && document.getElementsByTagName);

document.getElementsByClassName = function(className, container){
   var data = tags = [];
   var obj = document.getElementById("wrapper");
   var node = aux = null;
	var strClassName = className.replace(/\-/g, "\\-");
    var pattern = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
	if(container) node = (typeof(container) == "object") ? container : document.getElementById(container);
	else node = (obj) ? obj : document;
	aux = node.getElementsByTagName("*");
	tags = (document.all) ? node.all : aux;
   for(var i=0;i<tags.length;i++) { if(pattern.test(tags[i].className)) data.push(tags[i]);}
   return data;
}



var e = {
	addEvent : function(obj, evType, fn, useCapture){
		if (obj.addEventListener){
			obj.addEventListener(evType, fn, useCapture);
			return true;
		}else if (obj.attachEvent){
			var r = obj.attachEvent("on"+evType, fn);
			return r;
		}else {
			return false;
		}
	}
}

var fixes={
	setSideBar:function(){
		var obj = document.getElementById("sideBar");
		var cTop = null;
		cTop = fixes.createElementsCurves("cTop");
		obj.appendChild(cTop);
	},
	setCurves:function(obj){
		//var obj2 = document.getElementsByClassName("fixContent",document.getElementById("wrapper"))[0];
		var cTop = cBottom =  cTopRight = cBottomRight = null;
		cTop = fixes.createElementsCurves("cTop");
		cBottom = fixes.createElementsCurves("cBottom");
		cTopRight = fixes.createElementsCurves("cTopR");
		cBottomRight = fixes.createElementsCurves("cBottomR");
		obj.appendChild(cTop);
		obj.appendChild(cBottom);
		obj.appendChild(cTopRight);
		obj.appendChild(cBottomRight);

	},
	setTanta:function(){
		var objs = document.getElementById("main").getElementsByTagName("li");
		var cTopR = cTopL = null;
		for(var i = 0; i < objs.length; i++){
			cTopL = fixes.createElementsCurves("cTopLeft");
			cTopR = fixes.createElementsCurves("cTopRight");
			objs[i].appendChild(cTopL);
			objs[i].appendChild(cTopR);
			cTopR = cTopL = null;
		}
	},
	setBlocks:function(){
		var objs = document.getElementsByClassName("block",document.getElementById("main"));
		var cTopR = cTopL = null;
		if(objs.length != 0){
			for(var i = 0; i < objs.length; i++){
				cTopL = fixes.createElementsCurves("cTopLeft");
				cTopR = fixes.createElementsCurves("cTopRight");
				objs[i].appendChild(cTopL);
				objs[i].appendChild(cTopR);
				cTopR = cTopL = null;
			}
		}
	},
	setCv:function(){
		var obj = document.getElementById("cv").getElementsByTagName("div")[1];
		var cTop = cBot = null;
		cTop = fixes.createElementsCurves("cTop");
		cBot = fixes.createElementsCurves("cBot");
		obj.appendChild(cTop);
		obj.appendChild(cBot);

	},
	createElementsCurves:function(style){
		var element = document.createElement("div");
		element.className = style + " sp";
		element.appendChild(document.createTextNode(" "));
		return element;
	}
}

var layout={
	finalHeight:0,
	resize:function(){
		var index = document.getElementById("home")
		var wrapper = document.getElementById("wrapper");
		var sideBar = document.getElementById("sideBar");
		var main = document.getElementById("main");
		var hMain = main.offsetHeight + 6;
		var hSideBar = sideBar.offsetHeight - 20;
		var divElement = document.createElement("div");
		var size = layout.getViewportSize();
		divElement.className = "fix";
		divElement.appendChild(document.createTextNode(""));
		divElement.style.width = ((size[0] - wrapper.offsetWidth - wrapper.offsetLeft) + 16) + "px";
		if(parseInt(hMain) > parseInt(hSideBar)){
			if(!index) sideBar.style.height = (hMain - 62) + "px";
			divElement.style.height = hMain + "px";
		}else{
			if(!index) main.style.height = (hSideBar - 32) + "px";
			divElement.style.height = hSideBar + "px";
		}
		if(index) divElement.style.height = hMain + "px";
		wrapper.appendChild(divElement);
	},
	fixContent:function(){
		var wrapper = document.getElementById("wrapper");
		var divElement = document.createElement("div");
		var content = document.getElementById("content");
		divElement.className = "fixContent";
		divElement.style.height = content.offsetHeight + "px";
		wrapper.appendChild(divElement);
	},
	getViewportSize:function(){
		var size = [0,0];
		if(typeof window.innerWidth != 'undefined'){
			size = [window.innerWidth-17,window.innerHeight-17];
		}else if(typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth != 'undefined'
				 && document.documentElement.clientWidth != 0){
			size = [document.documentElement.clientWidth,document.documentElement.clientHeight];
		}else size = [document.getElementsByTagName("body")[0].clientWidth,document.getElementsByTagName("body")[0].clientHeight];
		return size;
	}
}

var info = {
	history:null,
	setEventsInfo:function(){
		var obj = document.getElementById("info");
		var aElements = obj.getElementsByTagName("a");
		var aElement = liElement = null;
		for(var i = 0; i < aElements.length; i++){
			aElement = aElements[i].parentNode.parentNode;
			liElement = aElement.parentNode;
			if(aElement.className == "title") aElements[i].onclick = function() { info.eventInfo(this);layout.resize();return false }
			if(liElement.className == "show") info.history = liElement;
		}
	},
	eventInfo:function(obj){
		var liElement = obj.parentNode.parentNode.parentNode;
		if(info.history != null) info.history.className = "";
		liElement.className = "show";
		info.history = liElement;
	}
}

var load={
	existeId:function(cid){
		if(document.getElementById(cid)) return true;
		return false;
	},
	existeClass:function(className){
		var content = document.getElementById("main");
		var existsClass = false;
		if(content){
			if(content.className.indexOf(className) != -1) existsClass = true;
		}
		return existsClass;
	},
	setEvents:function(){
		layout.resize();
		fixes.setBlocks();
		if(load.existeId("sideBar")) fixes.setSideBar();
		if(load.existeId("content")) {
			//layout.fixContent();
			fixes.setCurves(document.getElementById("content"));
		}
		if(load.existeId("breadCrumb")) fixes.setCurves(document.getElementById("breadCrumb"));
		if(load.existeId("info")) info.setEventsInfo();
		if(load.existeClass("tanta")) fixes.setTanta();
		if(load.existeId("cv")) fixes.setCv();
	}
}

if(W3CDOM) e.addEvent(window, "load", load.setEvents, false);