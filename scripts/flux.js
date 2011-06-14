/**
 * @author Flexible User Experience SL
 * @copyright 2011
 * coded with WebStorm
 */

var FLApp = {
    langCookie        : null,
    nodeSeleccionat   : 'manifest',
    langEng           : {},
    langEsp           : {},
    langCat           : {},
	nodeManifest      : {},
	nodeProjectes     : {},
	nodeBitacora      : {},
	nodePrivacitat    : {},
	nodeAvisLegal     : {},
    changeLangSelectorStatus : function (evt) {
        evt = evt || window.event;
        var target = (typeof evt.target !== 'undefined') ? evt.target : evt.srcElement;
        if (target.id == 'leng') {
            document.getElementById("leng").className = "lang-selected";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "";
            FLApp.langCookie = 'english';
            UT.writeCookie('user-language', 'english', 1000);
        } else if (target.id == 'lesp') {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "lang-selected";
		    document.getElementById("lcat").className = "";
            FLApp.langCookie = 'espanol';
            UT.writeCookie('user-language', 'espanol', 1000);
        } else {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "lang-selected";
            FLApp.langCookie = 'catala';
            UT.writeCookie('user-language', 'catala', 1000);
        }
        FLApp.changeLanguage();
    },
    changeLanguage : function() {
        var head    = document.documentElement.childNodes[0];
        var script  = document.createElement('script');
        script.onload = FLApp.updateDetailPanel;
        script.id   = 'i18nS'
        script.type = 'text/javascript';
        switch (FLApp.langCookie) {
            case 'english': script.src  = 'i18n/english.js'; break;
            case 'espanol': script.src  = 'i18n/espanol.js'; break;
            case 'catala' : script.src  = 'i18n/catala.js';  break;
        }
        head.removeChild(document.getElementById('i18nS'));
        head.appendChild(script);
    },
	showManifestPanel : function () {
		document.getElementById("manifest").className  = "selected";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "";
        FLApp.nodeSeleccionat = 'manifest';
		FLApp.updateDetailPanel();
	},
	showProjectesPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "selected";
		document.getElementById("bitacora").className  = "";
		FLApp.nodeSeleccionat = 'projectes';
        FLApp.updateDetailPanel();
	},
	showBitacoraPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "selected";
        FLApp.nodeSeleccionat = 'bitacora';
        FLApp.updateDetailPanel();
	},
    updateDetailPanel : function () {
        switch (FLApp.nodeSeleccionat) {
            case 'manifest':document.getElementById("main-right").innerHTML  = i18n.manifest;  break;
            case 'projectes':document.getElementById("main-right").innerHTML = i18n.projectes; break;
            case 'bitacora':document.getElementById("main-right").innerHTML  = i18n.bitacora;  break;
        }
        FLApp.updateTabSelector();
    },
    updateTabSelector : function () {
        FLApp.nodeManifest.innerHTML  = i18n.labelManifest;
        FLApp.nodeProjectes.innerHTML = i18n.labelProjectes;
        FLApp.nodeBitacora.innerHTML  = i18n.labelBitacora;
        FLApp.updateFooterText();
    },
    updateFooterText : function () {
        FLApp.nodePrivacitat.innerHTML = i18n.labelPrivacitat;
        FLApp.nodeAvisLegal.innerHTML  = i18n.labelAvisLegal;
    },
	showPrivacitatDialog : function () {
		document.getElementById("overlay-modal-dialog").innerHTML = i18n.privacitat;
		document.getElementById("warning").style.top  = ((window.innerHeight/2)-110) + 'px';
		document.getElementById("warning").style.left = ((window.innerWidth/2)-200) + 'px';
		document.getElementById("overlay-modal-dialog").style.visibility = 'visible';
	},
	showAvisLegalDialog : function () {
		console.log("[showAvisLegalDialog]");
	},
	cancelModalDialog : function () {
		document.getElementById("overlay-modal-dialog").style.visibility = 'hidden';
	},
	initViewController : function () {
        FLApp.langEng        = document.getElementById("leng");
        FLApp.langEsp        = document.getElementById("lesp");
        FLApp.langCat        = document.getElementById("lcat");
		FLApp.nodeManifest   = document.getElementById("manifest");
		FLApp.nodeProjectes  = document.getElementById("projectes");
		FLApp.nodeBitacora   = document.getElementById("bitacora");
		FLApp.nodePrivacitat = document.getElementById("privacitat");
		FLApp.nodeAvisLegal  = document.getElementById("avis-legal");
        UT.addEventHandler(FLApp.langEng,        "click", FLApp.changeLangSelectorStatus);
        UT.addEventHandler(FLApp.langEsp,        "click", FLApp.changeLangSelectorStatus);
        UT.addEventHandler(FLApp.langCat,        "click", FLApp.changeLangSelectorStatus);
		UT.addEventHandler(FLApp.nodeManifest,   "click", FLApp.showManifestPanel);
		UT.addEventHandler(FLApp.nodeProjectes,  "click", FLApp.showProjectesPanel);
		UT.addEventHandler(FLApp.nodeBitacora,   "click", FLApp.showBitacoraPanel);
		UT.addEventHandler(FLApp.nodePrivacitat, "click", FLApp.showPrivacitatDialog);
		UT.addEventHandler(FLApp.nodeAvisLegal,  "click", FLApp.showAvisLegalDialog);
        FLApp.updateDetailPanel();
	}
};

function initPage() {
    FLApp.langCookie = UT.readCookie('user-language');
    if (FLApp.langCookie == null) FLApp.langCookie = 'catala';
    var head   = document.documentElement.childNodes[0];
    var script = document.createElement('script');
    script.onload = FLApp.initViewController;
    script.id   = 'i18nS'
    script.type = 'text/javascript';
    switch (FLApp.langCookie) {
        case 'english':
            script.src  = 'i18n/english.js';
            document.getElementById("leng").className = "lang-selected";
            break;
        case 'espanol':
            script.src  = 'i18n/espanol.js';
            document.getElementById("lesp").className = "lang-selected";
            break;
        case 'catala' :
            script.src  = 'i18n/catala.js';
            document.getElementById("lcat").className = "lang-selected";
            break;
    }
    head.appendChild(script);
}

function closePage() {
    delete UT;
    delete FLApp;
}

window.onload   = initPage;
window.onunload = closePage;