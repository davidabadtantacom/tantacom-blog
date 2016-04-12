﻿/*	sIFR 2.0.2
	Copyright 2004 - 2006 Mike Davidson, Shaun Inman, Tomas Jogin and Mark Wubben

	This software is licensed under the CC-GNU LGPL <http://creativecommons.org/licenses/LGPL/2.1/>
*/

/* ** BEGIN SECURITY CHECK ** */
// Security
currentDomain = _root._url.split("/");
currentDomain = currentDomain[2];
function domainMatch() {
	for (i=0; i < allowedDomains.length; i++) {
		if (allowedDomains[i] == "*" || currentDomain == allowedDomains[i]) {
			return true;
			break;
		}
	}
}
islocal = (_root._url.indexOf("http://") == -1 || _root._url.indexOf("https://") == -1) ? true : false;

/* ** END SECURITY CHECK ** */

function launchURL (index) {
	launchURL_anchor = eval("sifr_url_"+index);
	launchURL_target = eval("sifr_url_"+index+"_target");
	getURL(launchURL_anchor,launchURL_target);
}

function buildText () {
	
	// Sets stage parameters
	Stage.scaleMode="noscale";
	Stage.align = "TL";
	Stage.showMenu=false;
	
	// Sets height and width of textbox	
	if (w == null) {
		w=300;
	}
	if (h == null) {
		h=100;
	}
	if (txt == null) {
		txt="Please pass in your text.";
	}
	orig_width = Number(w)+4;
	orig_height = Number(h)+4;

	// Sets styles
	if (textcolor != undefined) {
		if (textcolor.indexOf("#") > -1) {
			textcolor = textcolor.substring(1,7);
		}
		textcolor = "0x" + textcolor;
	} else {
		textcolor = "0x000000";
	}

	if (hovercolor != undefined) {
		if (hovercolor.indexOf("#") > -1) {
			hovercolor = hovercolor.substring(1,7);
		}
		hovercolor = "0x" + hovercolor;
	}
	
	if (linkcolor != undefined) {
		if (linkcolor.indexOf("#") > -1) {
			linkcolorhex = "0x" + linkcolor.substring(1,7);
		} else {
			linkcolorhex = "0x" + linkcolor;
		}
	}	
	
	holder.txtF._width = orig_width;
	holder.txtF._height = orig_height;
	holder.txtF._x = -2;
	holder.txtF._y = -2;
	holder.txtF.autoSize = "left";
	holder.txtF.condenseWhite = true;
	var fmt = new TextFormat();
	fmt.color = textcolor;
	fmt.size = Number(textsize);
	if (!leading) {
		leading = 1;
	} else {
		leading = Number(leading);
	}
	fmt.leading = leading;
	if (textalign != null) {
		fmt.align = textalign;
	}
	if (letterSpacing != null) fmt.letterSpacing = Number(letterSpacing);

	if (holder.txtF.htmlText.indexOf("<B>") > -1) {
	fmt.bold = true;
	}
	if (holder.txtF.htmlText.indexOf("<I>") > -1) {
	fmt.italic = true;
	}

	holder.txtF.htmlText = txt;
	holder.txtF.setTextFormat(fmt);
	
	textsize = 6;
	breaker1 = 0;
	while (holder.txtF.maxscroll == 1 && holder.txtF.textHeight <= (orig_height-4) && breaker1 < 300) {
		textsize++;
		fmt.size = textsize;
		holder.txtF.setTextFormat(fmt);
		holder.txtF._width = orig_width;
		holder.txtF._height = orig_height;
		ismax = holder.txtF.maxscroll;
		breaker1++;
	}
	textsize = textsize-1;
	fmt.size = textsize;
	holder.txtF.setTextFormat(fmt);
	holder.txtF._width = orig_width;
	holder.txtF._height = orig_height;
	
	if (offsetTop != undefined) {
		holder.txtF._y = holder.txtF._y + Number(offsetTop);
	}
	if (offsetLeft != undefined) {
		holder.txtF._x = holder.txtF._x + Number(offsetLeft);	
	}
	
	// if text contains an anchor, enable click actions	
	tempBlock = "";
	placeholder = holder.txtF.htmlText;
	if (placeholder.indexOf("<A") > -1) {
		breaker2 = 0;
		while (placeholder.indexOf("<A") > -1 && breaker2 < 300) {
			tempString = placeholder.substring(placeholder.indexOf("<A"));
			tempString = tempString.slice(0,tempString.indexOf("</A>")+4);
			tempArray = placeholder.split(tempString);
			tempBlock += tempArray[0]+"<FONT COLOR=\""+linkcolor+"\">"+tempString+"</FONT>";
			placeholder = tempArray[1];
			breaker2++;
		}
		tempBlock += tempArray[1];
		holder.txtF.htmlText = tempBlock;
		if (hovercolor != undefined || underline != undefined) {
			urlString = holder.txtF.htmlText.substring(holder.txtF.htmlText.indexOf("HREF=")+6);
			urlArray = urlString.split('"');
			var link_color = new Color(holder);		
			holder.onRollOver = function () { 	if (hovercolor != undefined) {
													link_color.setRGB(parseInt(hovercolor));
												}
												if (underline != undefined) {
													fmt.underline=true;
													holder.txtF.setTextFormat(fmt);
												}
											}
			holder.onRollOut = function () {	if (hovercolor != undefined) {
													link_color.setRGB(linkcolorhex);
												} 
												if (underline != undefined) {
													fmt.underline=false;
													holder.txtF.setTextFormat(fmt);
												}
											}
			holder.onRelease = function () {getURL(urlArray[0]);}			
		}	
	}	
	
	holder._alpha = 100;
}

// if all security tests are passed, build the text
if ((allowlocal && islocal) || domainMatch()) {
	buildText();
}
