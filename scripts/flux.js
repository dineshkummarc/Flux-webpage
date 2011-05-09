/**
 * @author Flux
 * @copyright 2011
 * coded with WebStorm
 */

var FLApp;
var FLTxt;

FLTxt = {
	labelManifest   : ["manifest", "manifiesto", "manifest"],
	labelProjectes  : ["projectes", "proyectos", "projects"],
	labelBitacora   : ["bitàcora", "bitácora", "blog"],
    labelAvisLegal  : ["avís legal", "aviso legal", "legal notice"],
    labelPrivacitat : ["privacitat", "privacidad", "privacy policy"],
	manifest : [
	  "<h1>Manifest</h1><p><strong>FL</strong>exible <strong>U</strong>ser e<strong>X</strong>perience (FLUX) neix de l'esforç i la il·lusió d'aconseguir els objectius següents:<ul><li>produïr i comercialitzar programari com a servei (<a href='http://en.wikipedia.org/wiki/Software_as_a_service'>SAAS</a>)</li><li>desenvolupar aplicacions web funcionals i senzilles</li><li>crear interfícies d'usuari innovadores, flexibles i útils</li><li>millorar l'experiència d'usuari (<a href='http://en.wikipedia.org/wiki/User_experience'>UX</a>)</li></ul></p>",
	  "<h1>Manifiesto</h1><p><strong>FL</strong>exible <strong>U</strong>ser e<strong>X</strong>perience (FLUX) nace del esfuerzo y la ilusión de conseguir los siguientes objectivos:<ul><li>producir y comercializar software como servicio (<a href='http://en.wikipedia.org/wiki/Software_as_a_service'>SAAS</a>)</li><li>desarollar aplicaciones web funcionales y sencillas</li><li>crear interfaces de usuario innovadoras, flexibles i útiles</li><li>mejorar la experiencia de usuario (<a href='http://en.wikipedia.org/wiki/User_experience'>UX</a>)</li></ul></p>",
	  "<h1>Manifest</h1>"],
	projectes : [
        "<h1>Projectes</h1><p><strong><a href='http://www.skaeda.com'>Skaeda</a></strong></p><p>Es un gestor personal d'enllaços a pàgines web favorites (<em>bookmarks</em>) amb les característiques següents:<ul><li>Organització per carpetes intel·ligents</li><li>previsualització d'enllaços amb miniatura</li><li>etiquetatge social independent de l'idioma</li><li>aplicació web en temps real verdadera</li></ul></p>",
        "<h1>Proyectos</h1><p><strong><a href='http://www.skaeda.com'>Skaeda</a></strong></p><p>Es un gestor personal de enlaces a páginas web favoritas (<em>bookmarks</em>) con las siguientes características:<ul><li>Organización por carpetas inteligentes</li><li>previsualitzación de enlaces con miniatura</li><li>etiquetaje social independiente del idioma</li><li>aplicación web en tiempo real verdadera</li></ul></p>",
        "<h1>Projects</h1>"],
	bitacora : [
        "<h1>Bitàcora</h1>",
        "<h1>Bitácora</h1>",
        "<h1>Blog</h1>"],
	privacitat : [
	  "<div id='warning' style='height:auto;'><p style='text-align:center;'><strong>Privacitat</strong></p><p>Segons la Llei orgánica 15/99, del 13 de desembre, sobre la protecció de dades ab caràcter personal, informem les dades que ens pugui cedir mitjançant aquesta pàgina web passaran a formar part d'un fitxer propietat de Flexible User Experience SL, amb la finalitat d'oferir-li els nostres serveis. Per a excercir el seu dret d'accès, rectificació, cancel·lació i/o oposició posis amb contacte amb nosaltres a <a href='mailto:info@flux.cat'>info@flux.cat</a>.</p><p>A Flux no ens agrada el spam i contribuïm a eliminar-lo.</p><p style='text-align:right'><button onclick='FLApp.cancelModalDialog();'>Ok</button></p></div>",
	  "<div id='warning' style='height:auto;'><p style='text-align:center;'><strong>Privacidad</strong></p><p>Según la Ley orgánica 15/99, del 13 de diciembre, de protección de datos de carácter personal, le hacemos saber que los datos que nos pueda facilitar mediante este sitio web pasarán a formar parte de un fichero propiedad de Flexible User Experience SL, con la finalidad de poderle ofrecer nuestros servicios. Para ejercer su derecho de acceso, rectificación, cancelación y/o oposición póngase en contacto con nosotros en <a href='mailto:info@flux.cat'>info@flux.cat</a>.</p><p>En Flux no nos gusta el spam y contribuimos a erradicarlo.</p><p style='text-align:right'><button onclick='FLApp.cancelModalDialog();'>Ok</button></p></div>",
	  "<div id='warning' style='height:auto;'><p style='text-align:center;'><strong>Privacy</strong></p><p>...</p><p style='text-align:right'><button onclick='FLApp.cancelModalDialog();'>Ok</button></p></div>"],
	avisLegal : []
};

FLApp = {
	IDIOMA_CATALA     : 0,
	IDIOMA_ESPANYOL   : 1,
	IDIOMA_INGLES     : 2,
	idiomaSeleccionat : {},
    nodeSeleccionat   : 'manifest',
    langEng           : {},
    langEsp           : {},
    langCat           : {},
	nodeManifest      : {},
	nodeProjectes     : {},
	nodeBitacora      : {},
	nodePrivacitat    : {},
	nodeAvisLegal     : {},
    addEventHandler : function (obj, eventName, handler) {
        if (document.addEventListener) {
            obj.addEventListener(eventName, handler, false);
        } else if (document.attachEvent) {
            obj.attachEvent("on"+eventName, handler);
        }
    },
    changeLangSelectorStatus : function (evt) {
        evt = evt || window.event;
        var target = (typeof evt.target !== 'undefined') ? evt.target : evt.srcElement;
        if (target.id == 'leng') {
            document.getElementById("leng").className = "lang-selected";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "";
            FLApp.idiomaSeleccionat = FLApp.IDIOMA_INGLES;
            FLApp.updateDetailPanel();
        } else if (target.id == 'lesp') {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "lang-selected";
		    document.getElementById("lcat").className = "";
            FLApp.idiomaSeleccionat = FLApp.IDIOMA_ESPANYOL;
            FLApp.updateDetailPanel();
        } else {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "lang-selected";
            FLApp.idiomaSeleccionat = FLApp.IDIOMA_CATALA;
            FLApp.updateDetailPanel();
        }
        FLApp.updateTabSelector();
        FLApp.updateFooterText();
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
        if (FLApp.nodeSeleccionat == 'manifest') {
            document.getElementById("main-right").innerHTML = FLTxt.manifest[FLApp.idiomaSeleccionat];
        } else if (FLApp.nodeSeleccionat == 'projectes') {
            document.getElementById("main-right").innerHTML = FLTxt.projectes[FLApp.idiomaSeleccionat];
        } else {
            document.getElementById("main-right").innerHTML = FLTxt.bitacora[FLApp.idiomaSeleccionat];
        }
    },
    updateTabSelector : function () {
        FLApp.nodeManifest.innerHTML  = FLTxt.labelManifest[FLApp.idiomaSeleccionat];
        FLApp.nodeProjectes.innerHTML = FLTxt.labelProjectes[FLApp.idiomaSeleccionat];
        FLApp.nodeBitacora.innerHTML  = FLTxt.labelBitacora[FLApp.idiomaSeleccionat];
    },
    updateFooterText : function () {
        FLApp.nodePrivacitat.innerHTML = FLTxt.labelPrivacitat[FLApp.idiomaSeleccionat];
        FLApp.nodeAvisLegal.innerHTML  = FLTxt.labelAvisLegal[FLApp.idiomaSeleccionat];
    },
	showPrivacitatDialog : function () {
		console.log("[showPrivacitatDialog]");
		document.getElementById("overlay-modal-dialog").innerHTML = FLTxt.privacitat[FLApp.idiomaSeleccionat];
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
		this.idiomaSeleccionat = this.IDIOMA_CATALA;
        this.langEng        = document.getElementById("leng");
        this.langEsp        = document.getElementById("lesp");
        this.langCat        = document.getElementById("lcat");
		this.nodeManifest   = document.getElementById("manifest");
		this.nodeProjectes  = document.getElementById("projectes");
		this.nodeBitacora   = document.getElementById("bitacora");
		this.nodePrivacitat = document.getElementById("privacitat");
		this.nodeAvisLegal  = document.getElementById("avis-legal");
        this.addEventHandler(this.langEng,        "click", FLApp.changeLangSelectorStatus);
        this.addEventHandler(this.langEsp,        "click", FLApp.changeLangSelectorStatus);
        this.addEventHandler(this.langCat,        "click", FLApp.changeLangSelectorStatus);
		this.addEventHandler(this.nodeManifest,   "click", FLApp.showManifestPanel);
		this.addEventHandler(this.nodeProjectes,  "click", FLApp.showProjectesPanel);
		this.addEventHandler(this.nodeBitacora,   "click", FLApp.showBitacoraPanel);
		this.addEventHandler(this.nodePrivacitat, "click", FLApp.showPrivacitatDialog);
		this.addEventHandler(this.nodeAvisLegal,  "click", FLApp.showAvisLegalDialog);
	}
};

function initPage() {
	FLApp.initViewController();
}

function closePage() {
	FLTxt = null;
    FLApp = null;
}

window.onload   = initPage;
window.onunload = closePage;