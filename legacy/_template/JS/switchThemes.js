var styleL = document.createElement('link');
styleL.rel = 'stylesheet';
styleL.href = 'lightTheme.css';

var styleD = document.createElement('link');
styleD.rel = 'stylesheet';
styleD.href = 'darkTheme.css';

document.getElementById('div') != null

if (localStorage.getItem("themeStyle") === "light") {
	document.head.appendChild(styleL);
	setLightTheme();
}
else if (localStorage.getItem("themeStyle") === "dark"){
	document.head.appendChild(styleD);
	setDarkTheme();
}
else {
	document.head.appendChild(styleL);
	localStorage.setItem("themeStyle", "light");
}

function setLightTheme(){
	if (localStorage.getItem("themeStyle") === "light") {
		return;
	}	
	else if (localStorage.getItem("themeStyle") === "dark"){
		document.head.replaceChild(styleL, styleD);
		localStorage.setItem("themeStyle", "light");
	}
	else{}
}
function setDarkTheme(){
	if (localStorage.getItem("themeStyle") === "dark") {
		return;
	}	
	else if (localStorage.getItem("themeStyle") === "light"){
		document.head.replaceChild(styleD, styleL);
		localStorage.setItem("themeStyle", "dark");
	}
	else{}
}