/**
 * @author Flux
 * developed with WebStorm
 */

var FLApp;
var FLTxt;

function addEventHandler(obj, eventName, handler) {
    if (document.addEventListener) {
        obj.addEventListener(eventName, handler, false);
    } else if (document.attachEvent) {
        obj.attachEvent("on"+eventName, handler);
    }
}

FLTxt = {
	labelManifest  : ["manifest", "manifiesto", "manifest"],
	labelProjectes : ["projectes", "proyectos", "projects"],
	labelBitacora  : ["bitàcora", "bitácora", "blog"],
	manifest : [
	  "<h1>Manifest</h1><p><strong>FL</strong>exible <strong>U</strong>ser e<strong>X</strong>perience (FLUX) neix amb l'objectiu de:"
	        + "<ul><li>desenvolupar aplicacions web funcionals i senzilles</li>"
	        + "<li>crear interficies d'usuari innovadores, flexibles i útils</li>"
	        + "<li>millorar l'experiencia d'usuari</li></ul></p>",
	  "<h1>Manifiesto</h1><p><strong>FL</strong>exible <strong>U</strong>ser e<strong>X</strong>perience (FLUX) nace con el objetivo de:"
	        + "<ul><li>desarrollar interficies de usuario</li><li>mejorar la experiencia del usuario</li></ul></p>",
	  ""],
	projectes : ["<h1>Projectes</h1>", "<h1>Proyectos</h1>", "<h1>Projects</h1>"],
	bitacora : ["<h1>Bitàcora</h1>", "<h1>Bitácora</h1>", "<h1>Log</h1>"],
	privacitat : [
	  "<div id='warning'><p>Privacitat</p>"
	        + "<p style='text-align:right'>Segons la Llei orgánica 15/99...<button onclick='FLApp.cancelModalDialog();'>Ok</button></p></div>",
	  "<div id='warning'><p>Privacidad</p>"
            + "<p>Según la Ley orgánica 15/99, de 13 de diciembre, de protección de datos de carácter personal, le hacemos saber que los datos " 
            + "que nos pueda facilitar mediante este sitio web pasarán a formar parte de un fichero propiedad de Flux S.L., con la única finalidad "
            + "de poderle ofrecer nuestros servicios. Para ejercer su derecho de acceso, rectificación, cancelación y oposición póngase en contacto "
            + "con nosotros en info@flux.cat.</p>"
            + "<p>En Flux no nos gusta el spam y contribuimos a erradicarlo.</p>"
            + "<p style='text-align:right'><button onclick='FLApp.cancelModalDialog();'>Ok</button></p></div>", 
	  ""],
	avisLegal : []
};

FLApp = {
	IDIOMA_CATALA     : 0,
	IDIOMA_ESPANYOL   : 1,
	IDIOMA_INGLES     : 2,
	idiomaSeleccionat : {},
	nodeManifest      : {},
	nodeProjectes     : {},
	nodeBitacora      : {},
	nodePrivacitat    : {},
	nodeAvisLegal     : {},
	showManifestPanel : function () {
		document.getElementById("manifest").className  = "selected";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "";
		document.getElementById("main-right").innerHTML = FLTxt.manifest[FLApp.idiomaSeleccionat];
	},
	showProjectesPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "selected";
		document.getElementById("bitacora").className  = "";
		document.getElementById("main-right").innerHTML = FLTxt.projectes[FLApp.idiomaSeleccionat];
	},
	showBitacoraPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "selected";
		document.getElementById("main-right").innerHTML = FLTxt.bitacora[FLApp.idiomaSeleccionat];
	},
	showPrivacitatDialog : function () {
		console.log("[showPrivacitatDialog]");
		document.getElementById("overlay-modal-dialog").innerHTML = FLTxt.privacitat[FLApp.idiomaSeleccionat];
		document.getElementById("warning").style.top  = ((window.innerHeight/2)-60) + 'px';
		document.getElementById("warning").style.left = ((window.innerWidth/2)-120) + 'px';
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
		this.nodeManifest   = document.getElementById("manifest");
		this.nodeProjectes  = document.getElementById("projectes");
		this.nodeBitacora   = document.getElementById("bitacora");
		this.nodePrivacitat = document.getElementById("privacitat");
		this.nodeAvisLegal  = document.getElementById("avis-legal");
		addEventHandler(this.nodeManifest,   "click", FLApp.showManifestPanel);
		addEventHandler(this.nodeProjectes,  "click", FLApp.showProjectesPanel);
		addEventHandler(this.nodeBitacora,   "click", FLApp.showBitacoraPanel);
		addEventHandler(this.nodePrivacitat, "click", FLApp.showPrivacitatDialog);
		addEventHandler(this.nodeAvisLegal,  "click", FLApp.showAvisLegalDialog);
	}
};

function initPage() {
	console.log("hello");
	FLApp.initViewController();
}

function closePage() {
	console.log("bye");
}

window.onload   = initPage;
window.onunload = closePage;