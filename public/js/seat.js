/************************************************************************************************************

 CUSTOM DRAG AND DROP SCRIPT
 This script is a part of DHTMLSuite for application which will be released before christmas 2006.
 (C) www.dhtmlgoodies.com, August 2006

 This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.

 Terms of use:
 Look at the terms of use at http://www.dhtmlgoodies.com/index.html?page=termsOfUse

 Thank you!

 www.dhtmlgoodies.com
 Alf Magne Kalleland

 ************************************************************************************************************/

/************************************************************************************************************
 *
 * Global variables
 *
 ************************************************************************************************************/

var standardObjectsCreated = false;	// The classes below will check this variable, if it is false, default help objects will be created
var clientInfoObj;	// Object of class DHTMLgoodies_clientInfo
var dhtmlSuiteConfigObj = false; 	// Object of class DHTMLgoodies_config
var dhtmlSuiteCommonObj;	// Object of class DHTMLgoodies_common

// {{{ DHTMLgoodies_createStandardObjects()
/**
 * Create objects used by all scripts
 *
 * @public
 */

function DHTMLgoodies_createStandardObjects() {
    clientInfoObj = new DHTMLgoodies_clientInfo();	// Create browser info object
    clientInfoObj.init();
    if (!dhtmlSuiteConfigObj) {	// If this object isn't allready created, create it.
        dhtmlSuiteConfigObj = new DHTMLgoodies_config();	// Create configuration object.
        dhtmlSuiteConfigObj.init();
    }
    dhtmlSuiteCommonObj = new DHTMLgoodies_common();	// Create configuration object.
    dhtmlSuiteCommonObj.init();
}

/************************************************************************************************************
 *    Configuration class used by most of the scripts
 *
 *    Created:            August, 19th, 2006
 *    Purpose of class:    Store global variables/configurations used by the classes below. Example: If you want to
 *                        change the path to the images used by the scripts, change it here. An object of this
 *                        class will always be available to the other classes. The name of this object is
 *                        "dhtmlSuiteConfigObj".
 *
 *                        If you want to create an object of this class manually, remember to name it "dhtmlSuiteConfigObj"
 *                        This object should then be created before any other objects. This is nescessary if you want
 *                        the other objects to use the values you have put into the object.
 *    Update log:
 *
 ************************************************************************************************************/

// {{{ DHTMLgoodies_config()
/**
 * Constructor
 *
 * @public
 */
function DHTMLgoodies_config() {
    var imagePath;	// Path to images used by the classes.
    var cssPath;	// Path to CSS files used by the DHTML suite.
}


DHTMLgoodies_config.prototype = {
    // {{{ init()
    /**
     *
     * @public
     */
    init: function () {
        this.imagePath = 'images_dhtmlsuite/';	// Path to images
        this.cssPath = 'css_dhtmlsuite/';	// Path to images
    }
    // }}}
    ,
    // {{{ setCssPath()
    /**
     * This method will save a new CSS path, i.e. where the css files of the dhtml suite are located.
     *
     * @param string newCssPath = New path to css files
     * @public
     */

    setCssPath: function (newCssPath) {
        this.cssPath = newCssPath;
    }
    // }}}
    ,
    // {{{ setImagePath()
    /**
     * This method will save a new image file path, i.e. where the image files used by the dhtml suite ar located
     *
     * @param string newImagePath = New path to image files
     * @public
     */
    setImagePath: function (newImagePath) {
        this.imagePath = newImagePath;
    }
    // }}}
}

/************************************************************************************************************
 *    A class with general methods used by most of the scripts
 *
 *    Created:            August, 19th, 2006
 *    Purpose of class:    A class containing common method used by one or more of the gui classes below,
 *                        example: loadCSS.
 *                        An object("dhtmlSuiteCommonObj") of this  class will always be available to the other classes.
 *    Update log:
 *
 ************************************************************************************************************/

// {{{ DHTMLgoodies_common()
/**
 * Constructor
 *
 */
function DHTMLgoodies_common() {
    var loadedCSSFiles;	// Array of loaded CSS files. Prevent same CSS file from being loaded twice.
}

DHTMLgoodies_common.prototype = {

    // {{{ init()
    /**
     * This method initializes the DHTMLgoodies_common object.
     *
     * @public
     */

    init: function () {
        this.loadedCSSFiles = new Array();
    }
    // }}}
    ,
    // {{{ getTopPos()
    /**
     * This method will return the top coordinate(pixel) of an object
     *
     * @param Object inputObj = Reference to HTML element
     * @public
     */
    getTopPos: function (inputObj) {
        var returnValue = inputObj.offsetTop;
        while ((inputObj = inputObj.offsetParent) != null) {
            if (inputObj.tagName != 'HTML') {
                returnValue += inputObj.offsetTop;
                if (document.all) returnValue += inputObj.clientTop;
            }
        }
        return returnValue;
    }
    // }}}

    ,
    // {{{ getLeftPos()
    /**
     * This method will return the left coordinate(pixel) of an object
     *
     * @param Object inputObj = Reference to HTML element
     * @public
     */
    getLeftPos: function (inputObj) {
        var returnValue = inputObj.offsetLeft;
        while ((inputObj = inputObj.offsetParent) != null) {
            if (inputObj.tagName != 'HTML') {
                returnValue += inputObj.offsetLeft;
                if (document.all) returnValue += inputObj.clientLeft;
            }
        }
        return returnValue;
    }
    // }}}
    ,
    // {{{ cancelEvent()
    /**
     *
     *  This function only returns false. It is used to cancel selections and drag
     *
     *
     * @public
     */

    cancelEvent: function () {
        return false;
    }
    // }}}

}


/************************************************************************************************************
 *    Client info class
 *
 *    Created:            August, 18th, 2006
 *    Purpose of class:    Provide browser information to the classes below. Instead of checking for
 *                        browser versions and browser types in the classes below, they should check this
 *                        easily by referncing properties in the class below. An object("clientInfoObj") of this
 *                        class will always be accessible to the other classes.
 *    Update log:
 *
 ************************************************************************************************************/

/*
Constructor
*/

function DHTMLgoodies_clientInfo() {
    var browser;			// Complete user agent information

    var isOpera;			// Is the browser "Opera"
    var isMSIE;				// Is the browser "Internet Explorer"
    var isFirefox;			// Is the browser "Firefox"
    var navigatorVersion;	// Browser version
}

DHTMLgoodies_clientInfo.prototype = {

    /**
     *    Constructor
     *    Params:        none:
     *    return value:    none;
     **/
    // {{{ init()
    /**
     *
     *
     *  This method initializes the script
     *
     *
     * @public
     */

    init: function () {
        this.browser = navigator.userAgent;
        this.isOpera = (this.browser.toLowerCase().indexOf('opera') >= 0) ? true : false;
        this.isFirefox = (this.browser.toLowerCase().indexOf('firefox') >= 0) ? true : false;
        this.isMSIE = (this.browser.toLowerCase().indexOf('msie') >= 0) ? true : false;
        this.navigatorVersion = navigator.appVersion.replace(/.*?MSIE (\d\.\d).*/g, '$1') / 1;
    }
    // }}}
}


/************************************************************************************************************
 *    Drag and drop class
 *
 *    Created:            August, 18th, 2006
 *    Purpose of class:    A general drag and drop class. By creating objects of this class, you can make elements
 *                        on your web page dragable and also assign actions to element when an item is dropped on it.
 *                        A page should only have one object of this class.
 *
 *                        IMPORTANT when you use this class: Don't assign layout to the dragable element ids
 *                        Assign it to classes or the tag instead. example: If you make <div id="dragableBox1" class="aBox">
 *                        dragable, don't assign css to #dragableBox1. Assign it to div or .aBox instead.
 *
 *    Update log:
 *
 ************************************************************************************************************/

var referenceToDragDropObject;	// A reference to an object of the class below.

/*
Constructor
*/
function DHTMLgoodies_dragDrop() {
    var mouse_x;					// mouse x position when drag is started
    var mouse_y;					// mouse y position when drag is started.

    var el_x;						// x position of dragable element
    var el_y;						// y position of dragable element

    var dragDropTimer;				// Timer - short delay from mouse down to drag init.
    var numericIdToBeDragged;		// numeric reference to element currently being dragged.
    var dragObjCloneArray;			// Array of cloned dragable elements. every
    var dragDropSourcesArray;		// Array of source elements, i.e. dragable elements.
    var dragDropTargetArray;		// Array of target elements, i.e. elements where items could be dropped.
    var currentZIndex;				// Current z index. incremented on each drag so that currently dragged element is always on top.
    var okToStartDrag;				// Variable which is true or false. It would be false for 1/100 seconds after a drag has been started.
    // This is useful when you have nested dragable elements. It prevents the drag process from staring on
    // parent element when you click on dragable sub element.
    var moveBackBySliding;			// Variable indicating if objects should slide into place moved back to their location without any slide animation.
}

DHTMLgoodies_dragDrop.prototype = {

    // {{{ init()
    /**
     * Initialize the script
     * This method should be called after you have added sources and destinations.
     *
     * @public
     */
    init: function () {
        if (!standardObjectsCreated) DHTMLgoodies_createStandardObjects();	// This line starts all the init methods
        this.currentZIndex = 10000;
        this.dragDropTimer = -1;
        this.dragObjCloneArray = new Array();
        this.numericIdToBeDragged = false;
        this.__initDragDropScript();
        referenceToDragDropObject = this;
        this.okToStartDrag = true;
        this.moveBackBySliding = true;
    }
    // }}}
    ,
    // {{{ addSource()
    /**
     * Add dragable element
     *
     * @param String sourceId = Id of source
     * @param boolean slideBackAfterDrop = Slide the item back to it's original location after drop.
     * @param boolean xAxis = Allowed to slide along the x-axis(default = true, i.e. if omitted).
     * @param boolean yAxis = Allowed to slide along the y-axis(default = true, i.e. if omitted).
     * @param String dragOnlyWithinElId = You will only allow this element to be dragged within the boundaries of the element with this id.
     * @param String functionToCallOnDrag = Function to call when drag is initiated. id of element(clone and orig) will be passed to this function . clone is a copy of the element created by this script. The clone is what you see when drag is in process.
     *
     * @public
     */
    addSource: function (sourceId, slideBackAfterDrop, xAxis, yAxis, dragOnlyWithinElId, functionToCallOnDrag) {
        if (!functionToCallOnDrag) functionToCallOnDrag = false;
        if (!this.dragDropSourcesArray) this.dragDropSourcesArray = new Array();
        if (!document.getElementById(sourceId)) alert('The source element with id ' + sourceId + ' does not exists');
        var obj = document.getElementById(sourceId);

        if (xAxis !== false) xAxis = true;
        if (yAxis !== false) yAxis = true;

        this.dragDropSourcesArray[this.dragDropSourcesArray.length] = [obj, slideBackAfterDrop, xAxis, yAxis, dragOnlyWithinElId, functionToCallOnDrag];
        obj.setAttribute('dragableElement', this.dragDropSourcesArray.length - 1);
        obj.dragableElement = this.dragDropSourcesArray.length - 1;

    }
    // }}}
    ,
    // {{{ addTarget()
    /**
     * Add drop target
     *
     * @param String targetId = Id of drop target
     * @param String functionToCallOnDrop = name of function to call on drop.
     *        Input to this the function specified in functionToCallOnDrop function would be
     *        id of dragged element
     *        id of the element the item was dropped on.
     *        mouse x coordinate when item was dropped
     *        mouse y coordinate when item was dropped
     *
     * @public
     */
    addTarget: function (targetId, functionToCallOnDrop) {
        if (!this.dragDropTargetArray) this.dragDropTargetArray = new Array();
        if (!document.getElementById(targetId)) alert('The target element with id ' + targetId + ' does not exists');
        var obj = document.getElementById(targetId);
        this.dragDropTargetArray[this.dragDropTargetArray.length] = [obj, functionToCallOnDrop];
    }
    // }}}
    ,

    // {{{ setSlide()
    /**
     * Activate or deactivate sliding animations.
     *
     * @param boolean slide = Move element back to orig. location in a sliding animation
     *
     * @public
     */
    setSlide: function (slide) {
        this.moveBackBySliding = slide;

    }
    // }}}
    ,

    /* Start private methods */

    // {{{ __initDragDropScript()
    /**
     * Initialize drag drop script - this method is called by the init() method.
     *
     * @private
     */
    __initDragDropScript: function () {
        var refToThis = this;
        for (var no = 0; no < this.dragDropSourcesArray.length; no++) {
            var el = this.dragDropSourcesArray[no][0].cloneNode(true);
            el.onmousedown = this.__initDragDropElement;
            el.id = 'DHTMLgoodies_dragableElement' + no;
            el.style.position = 'absolute';
            el.style.visibility = 'hidden';
            el.style.display = 'none';

            this.dragDropSourcesArray[no][0].parentNode.insertBefore(el, this.dragDropSourcesArray[no][0]);

            el.style.top = dhtmlSuiteCommonObj.getTopPos(this.dragDropSourcesArray[no][0]) + 'px';
            el.style.left = dhtmlSuiteCommonObj.getLeftPos(this.dragDropSourcesArray[no][0]) + 'px';

            this.dragDropSourcesArray[no][0].onmousedown = this.__initDragDropElement;

            this.dragObjCloneArray[no] = el;
        }

        document.documentElement.onmousemove = this.__moveDragableElement;
        document.documentElement.onmouseup = this.__stop_dragDropElement;
        document.documentElement.onselectstart = function () {
            return refToThis.__cancelSelectionEvent(false, this)
        };
        document.documentElement.ondragstart = function () {
            return dhtmlSuiteCommonObj.cancelEvent(false, this)
        };
    }
    // }}}
    ,

    // {{{ __initDragDropElement()
    /**
     * Initialize drag process
     *
     * @param Event e = Event object, used to get x and y coordinate of mouse pointer
     *
     * @private
     */
    // {{{ __initDragDropElement()
    /**
     * Initialize drag process
     *
     * @param Event e = Event object, used to get x and y coordinate of mouse pointer
     *
     * @private
     */
    __initDragDropElement: function (e) {
        if (!referenceToDragDropObject.okToStartDrag) return;
        referenceToDragDropObject.okToStartDrag = false;
        setTimeout('referenceToDragDropObject.okToStartDrag = true;', 100);
        if (document.all) e = event;
        referenceToDragDropObject.numericIdToBeDragged = this.getAttribute('dragableElement');
        referenceToDragDropObject.numericIdToBeDragged = referenceToDragDropObject.numericIdToBeDragged + '';
        if (referenceToDragDropObject.numericIdToBeDragged == '') referenceToDragDropObject.numericIdToBeDragged = this.dragableElement;
        referenceToDragDropObject.dragDropTimer = 0;

        referenceToDragDropObject.mouse_x = e.clientX;
        referenceToDragDropObject.mouse_y = e.clientY;

        referenceToDragDropObject.currentZIndex = referenceToDragDropObject.currentZIndex + 1;

        referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged].style.zIndex = referenceToDragDropObject.currentZIndex;

        referenceToDragDropObject.currentEl_allowX = referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][2];
        referenceToDragDropObject.currentEl_allowY = referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][3];

        var parentEl = referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][4];
        referenceToDragDropObject.drag_minX = false;
        referenceToDragDropObject.drag_minY = false;
        referenceToDragDropObject.drag_maxX = false;
        referenceToDragDropObject.drag_maxY = false;
        if (parentEl) {
            var obj = document.getElementById(parentEl);
            if (obj) {
                referenceToDragDropObject.drag_minX = dhtmlSuiteCommonObj.getLeftPos(obj);
                referenceToDragDropObject.drag_minY = dhtmlSuiteCommonObj.getTopPos(obj);
                referenceToDragDropObject.drag_maxX = referenceToDragDropObject.drag_minX + obj.clientWidth;
                referenceToDragDropObject.drag_maxY = referenceToDragDropObject.drag_minY + obj.clientHeight;
            }
        }


        // Reposition dragable element
        if (referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][1]) {
            referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged].style.top = dhtmlSuiteCommonObj.getTopPos(referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][0]) + 'px';
            referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged].style.left = dhtmlSuiteCommonObj.getLeftPos(referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][0]) + 'px';
        }
        referenceToDragDropObject.el_x = referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged].style.left.replace('px', '') / 1;
        referenceToDragDropObject.el_y = referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged].style.top.replace('px', '') / 1;


        referenceToDragDropObject.__timerDragDropElement();


        return false;
    }
    // }}}
    ,

    // {{{ __timerDragDropElement()
    /**
     * A small delay from mouse down to drag starts
     *
     * @private
     */
    __timerDragDropElement: function () {
        window.thisRef = this;
        if (this.dragDropTimer >= 0 && this.dragDropTimer < 5) {
            this.dragDropTimer = this.dragDropTimer + 1;
            setTimeout('window.thisRef.__timerDragDropElement()', 2);
            return;
        }
        if (this.dragDropTimer >= 5) {
            if (this.dragObjCloneArray[this.numericIdToBeDragged].style.display == 'none') {
                this.dragDropSourcesArray[this.numericIdToBeDragged][0].style.visibility = 'hidden';
                this.dragObjCloneArray[this.numericIdToBeDragged].style.display = 'block';
                this.dragObjCloneArray[this.numericIdToBeDragged].style.visibility = 'visible';
                this.dragObjCloneArray[this.numericIdToBeDragged].style.top = dhtmlSuiteCommonObj.getTopPos(this.dragDropSourcesArray[this.numericIdToBeDragged][0]) + 'px';
                this.dragObjCloneArray[this.numericIdToBeDragged].style.left = dhtmlSuiteCommonObj.getLeftPos(this.dragDropSourcesArray[this.numericIdToBeDragged][0]) + 'px';
            }

            if (this.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][5]) {
                var id1 = this.dragObjCloneArray[this.numericIdToBeDragged].id + '';
                var id2 = this.dragDropSourcesArray[this.numericIdToBeDragged][0].id + '';

                var string = this.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][5] + '("' + id1 + '","' + id2 + '")';
                eval(string);
            }
        }
    }
    // }}}
    ,

    // {{{ __cancelSelectionEvent()
    /**
     * Cancel text selection when drag is in progress
     *
     * @private
     */
    __cancelSelectionEvent: function () {
        if (this.dragDropTimer >= 0) return false;
        return true;
    }
    // }}}
    ,

    // {{{ __moveDragableElement()
    /**
     * Move dragable element according to mouse position when drag is in process.
     *
     * @param Event e = Event object, used to get x and y coordinate of mouse pointer
     *
     * @private
     */
    __moveDragableElement: function (e) {
        if (document.all) e = event;
        if (referenceToDragDropObject.dragDropTimer < 5) return;
        var dragObj = referenceToDragDropObject.dragObjCloneArray[referenceToDragDropObject.numericIdToBeDragged];

        if (referenceToDragDropObject.currentEl_allowX) {

            var leftPos = (e.clientX - referenceToDragDropObject.mouse_x + referenceToDragDropObject.el_x);
            if (referenceToDragDropObject.drag_maxX) {
                var tmpMaxX = referenceToDragDropObject.drag_maxX - dragObj.offsetWidth;
                if (leftPos > tmpMaxX) leftPos = tmpMaxX
                if (leftPos < referenceToDragDropObject.drag_minX) leftPos = referenceToDragDropObject.drag_minX;
            }
            dragObj.style.left = leftPos + 'px';

        }
        if (referenceToDragDropObject.currentEl_allowY) {
            var topPos = (e.clientY - referenceToDragDropObject.mouse_y + referenceToDragDropObject.el_y);
            if (referenceToDragDropObject.drag_maxY) {
                var tmpMaxY = referenceToDragDropObject.drag_maxY - dragObj.offsetHeight;
                if (topPos > tmpMaxY) topPos = tmpMaxY;
                if (topPos < referenceToDragDropObject.drag_minY) topPos = referenceToDragDropObject.drag_minY;

            }

            dragObj.style.top = topPos + 'px';
        }

    }
    // }}}
    ,

    // {{{ __stop_dragDropElement()
    /**
     * Drag process stopped.
     * Note! In this method "this" refers to the element being dragged. referenceToDragDropObject refers to the dragDropObject.
     *
     * @param Event e = Event object, used to get x and y coordinate of mouse pointer
     *
     * @private
     */
    __stop_dragDropElement: function (e) {
        if (referenceToDragDropObject.dragDropTimer < 5) return;
        if (document.all) e = event;

        // Dropped on which element
        if (e.target) dropDestination = e.target;
        else if (e.srcElement) dropDestination = e.srcElement;
        if (dropDestination.nodeType == 3) // defeat Safari bug
            dropDestination = dropDestination.parentNode;


        var leftPosMouse = e.clientX + Math.max(document.body.scrollLeft, document.documentElement.scrollLeft);
        var topPosMouse = e.clientY + Math.max(document.body.scrollTop, document.documentElement.scrollTop);

        if (!referenceToDragDropObject.dragDropTargetArray) referenceToDragDropObject.dragDropTargetArray = new Array();
        // Loop through drop targets and check if the coordinate of the mouse is over it. If it is, call specified drop function.
        for (var no = 0; no < referenceToDragDropObject.dragDropTargetArray.length; no++) {
            var leftPosEl = dhtmlSuiteCommonObj.getLeftPos(referenceToDragDropObject.dragDropTargetArray[no][0]);
            var topPosEl = dhtmlSuiteCommonObj.getTopPos(referenceToDragDropObject.dragDropTargetArray[no][0]);
            var widthEl = referenceToDragDropObject.dragDropTargetArray[no][0].offsetWidth;
            var heightEl = referenceToDragDropObject.dragDropTargetArray[no][0].offsetHeight;

            if (leftPosMouse > leftPosEl && leftPosMouse < (leftPosEl + widthEl) && topPosMouse > topPosEl && topPosMouse < (topPosEl + heightEl)) {
                if (referenceToDragDropObject.dragDropTargetArray[no][1]) eval(referenceToDragDropObject.dragDropTargetArray[no][1] + '("' + referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][0].id + '","' + referenceToDragDropObject.dragDropTargetArray[no][0].id + '",' + e.clientX + ',' + e.clientY + ')');
                break;
            }
        }

        if (referenceToDragDropObject.dragDropSourcesArray[referenceToDragDropObject.numericIdToBeDragged][1]) {
            referenceToDragDropObject.__slideElementBackIntoItsOriginalPosition(referenceToDragDropObject.numericIdToBeDragged);
        }

        // Variable cleanup after drop
        referenceToDragDropObject.dragDropTimer = -1;
        referenceToDragDropObject.numericIdToBeDragged = false;

    }
    // }}}
    ,

    // {{{ __slideElementBackIntoItsOriginalPosition()
    /**
     * Slide an item back to it's original position
     *
     * @param Integer numId = numeric index of currently dragged element
     *
     * @private
     */
    __slideElementBackIntoItsOriginalPosition: function (numId) {
        // Coordinates current element position
        var currentX = this.dragObjCloneArray[numId].style.left.replace('px', '') / 1;
        var currentY = this.dragObjCloneArray[numId].style.top.replace('px', '') / 1;

        // Coordinates - where it should slide to
        var targetX = dhtmlSuiteCommonObj.getLeftPos(referenceToDragDropObject.dragDropSourcesArray[numId][0]);
        var targetY = dhtmlSuiteCommonObj.getTopPos(referenceToDragDropObject.dragDropSourcesArray[numId][0]);
        ;

        if (this.moveBackBySliding) {
            // Call the step by step slide method
            this.__processSlide(numId, currentX, currentY, targetX, targetY);
        } else {
            this.dragObjCloneArray[numId].style.display = 'none';
            this.dragDropSourcesArray[numId][0].style.visibility = 'visible';
        }

    }
    // }}}
    ,

    // {{{ __processSlide()
    /**
     * Move the element step by step in this method
     *
     * @param Int numId = numeric index of currently dragged element
     * @param Int currentX = Elements current X position
     * @param Int currentY = Elements current Y position
     * @param Int targetX = Destination X position, i.e. where the element should slide to
     * @param Int targetY = Destination Y position, i.e. where the element should slide to
     *
     * @private
     */
    __processSlide: function (numId, currentX, currentY, targetX, targetY) {
        // Find slide x value
        var slideX = Math.round(Math.abs(Math.max(currentX, targetX) - Math.min(currentX, targetX)) / 10);
        // Find slide y value
        var slideY = Math.round(Math.abs(Math.max(currentY, targetY) - Math.min(currentY, targetY)) / 10);

        if (slideY < 3 && Math.abs(slideX) < 10) slideY = 3;	// 3 is minimum slide value
        if (slideX < 3 && Math.abs(slideY) < 10) slideX = 3;	// 3 is minimum slide value


        if (currentX > targetX) slideX *= -1;	// If current x is larger than target x, make slide value negative<br>
        if (currentY > targetY) slideY *= -1;	// If current y is larger than target x, make slide value negative

        // Update currentX and currentY
        currentX = currentX + slideX;
        currentY = currentY + slideY;

        // If currentX or currentY is close to targetX or targetY, make currentX equal to targetX(or currentY equal to targetY)
        if (Math.max(currentX, targetX) - Math.min(currentX, targetX) < 4) currentX = targetX;
        if (Math.max(currentY, targetY) - Math.min(currentY, targetY) < 4) currentY = targetY;

        // Update CSS position(left and top)
        this.dragObjCloneArray[numId].style.left = currentX + 'px';
        this.dragObjCloneArray[numId].style.top = currentY + 'px';

        // currentX different than targetX or currentY different than targetY, call this function in again in 5 milliseconds
        if (currentX != targetX || currentY != targetY) {
            window.thisRef = this;	// Reference to this dragdrop object
            setTimeout('window.thisRef.__processSlide("' + numId + '",' + currentX + ',' + currentY + ',' + targetX + ',' + targetY + ')', 5);
        } else {	// Slide completed. Make absolute positioned element invisible and original element visible
            this.dragObjCloneArray[numId].style.display = 'none';
            this.dragDropSourcesArray[numId][0].style.visibility = 'visible';
        }
    }
}


// Custom drop action for the country boxes
function dropItems(idOfDraggedItem, targetId, x, y) {
    var targetObj = document.getElementById(targetId);	// Creating reference to target obj

    var subDivs = targetObj.getElementsByTagName('DIV');	// Number of subdivs
    if (subDivs.length > 0 && targetId != 'capitals') return;	// Sub divs exists on target, i.e. element already dragged on it. => return from function without doing anything
    var sourceObj = document.getElementById(idOfDraggedItem);	// Creating reference to source, i.e. dragged object
    var numericIdTarget = targetId.replace(/[^0-9]/gi, '') / 1;// Find numeric id of target

    var numericIdSource = idOfDraggedItem.replace(/[^0-9]/gi, '') / 1;	// Find numeric id of source
    var dog=(numericIdSource).toString();
    var fish=(numericIdTarget).toString();

    if (numericIdTarget - numericIdSource!=null) {	// In the html above, there's a difference in 100 between the id of the country and it's capital(example:
        // Oslo have id "box1" and Norway have id "box101", i.e. 1 + 100.
        // targetObj.style.backgroundColor='#00FF00';
        document.getElementById(dog).value= fish;

        // Set green background color for dragged object
    } else {
        sourceObj.style.backgroundColor = '';	// Reset back to default white background color
    }
    if (targetId == 'capitals') {	// Target is the capital box - append the dragged item as child of first sub div, i.e. as child of <div id="dropContent">
        targetObj = targetObj.getElementsByTagName('DIV')[0];
    }
    targetObj.appendChild(sourceObj);	// Append
    // document.write(numericIdSource);
}


var dragDropObj = new DHTMLgoodies_dragDrop();	// Creating drag and drop object

// Assigning drag events to the capitals
dragDropObj.addSource('box1', true);
dragDropObj.addSource('box2', true);
dragDropObj.addSource('box3', true);
dragDropObj.addSource('box4', true);
dragDropObj.addSource('box5', true);
dragDropObj.addSource('box6', true);
dragDropObj.addSource('box7', true);
dragDropObj.addSource('box8', true);
dragDropObj.addSource('box9', true);
dragDropObj.addSource('box10', true);
dragDropObj.addSource('box11', true);
dragDropObj.addSource('box12', true);
dragDropObj.addSource('box13', true);
dragDropObj.addSource('box14', true);
dragDropObj.addSource('box15', true);
dragDropObj.addSource('box16', true);
dragDropObj.addSource('box17', true);
dragDropObj.addSource('box18', true);
dragDropObj.addSource('box19', true);
dragDropObj.addSource('box20', true);
dragDropObj.addSource('box21', true);
dragDropObj.addSource('box22', true);
dragDropObj.addSource('box23', true);
dragDropObj.addSource('box24', true);
dragDropObj.addSource('box25', true);
dragDropObj.addSource('box26', true);
dragDropObj.addSource('box27', true);
dragDropObj.addSource('box28', true);
dragDropObj.addSource('box29', true);
dragDropObj.addSource('box30', true);
dragDropObj.addSource('box31', true);
dragDropObj.addSource('box32', true);
dragDropObj.addSource('box33', true);
dragDropObj.addSource('box34', true);
dragDropObj.addSource('box35', true);
dragDropObj.addSource('box36', true);
dragDropObj.addSource('box37', true);
dragDropObj.addSource('box38', true);
dragDropObj.addSource('box39', true);
dragDropObj.addSource('box40', true);
dragDropObj.addSource('box41', true);
dragDropObj.addSource('box42', true);
dragDropObj.addSource('box43', true);
dragDropObj.addSource('box44', true);
dragDropObj.addSource('box45', true);
dragDropObj.addSource('box46', true);
dragDropObj.addSource('box47', true);
dragDropObj.addSource('box48', true);
dragDropObj.addSource('box49', true);
dragDropObj.addSource('box50', true);
dragDropObj.addSource('box51', true);
dragDropObj.addSource('box52', true);
dragDropObj.addSource('box53', true);
dragDropObj.addSource('box54', true);
dragDropObj.addSource('box55', true);
dragDropObj.addSource('box56', true);
dragDropObj.addSource('box57', true);
dragDropObj.addSource('box58', true);
dragDropObj.addSource('box59', true);
dragDropObj.addSource('box60', true);
dragDropObj.addSource('box61', true);
dragDropObj.addSource('box62', true);
dragDropObj.addSource('box63', true);
dragDropObj.addSource('box64', true);
dragDropObj.addSource('box65', true);
dragDropObj.addSource('box66', true);
dragDropObj.addSource('box67', true);
dragDropObj.addSource('box68', true);
dragDropObj.addSource('box69', true);
dragDropObj.addSource('box70', true);
dragDropObj.addSource('box71', true);
dragDropObj.addSource('box72', true);
dragDropObj.addSource('box73', true);
dragDropObj.addSource('box74', true);
dragDropObj.addSource('box75', true);
dragDropObj.addSource('box76', true);
dragDropObj.addSource('box77', true);
dragDropObj.addSource('box78', true);
dragDropObj.addSource('box79', true);
dragDropObj.addSource('box80', true);
dragDropObj.addSource('box81', true);
dragDropObj.addSource('box82', true);
dragDropObj.addSource('box83', true);
dragDropObj.addSource('box84', true);
dragDropObj.addSource('box85', true);
dragDropObj.addSource('box86', true);
dragDropObj.addSource('box87', true);
dragDropObj.addSource('box88', true);
dragDropObj.addSource('box89', true);
dragDropObj.addSource('box90', true);
dragDropObj.addSource('box91', true);
dragDropObj.addSource('box92', true);
dragDropObj.addSource('box93', true);
dragDropObj.addSource('box94', true);
dragDropObj.addSource('box95', true);
dragDropObj.addSource('box96', true);
dragDropObj.addSource('box97', true);
dragDropObj.addSource('box98', true);
dragDropObj.addSource('box99', true);
dragDropObj.addSource('box100', true);
dragDropObj.addSource('box101', true);
dragDropObj.addSource('box102', true);
dragDropObj.addSource('box103', true);
dragDropObj.addSource('box104', true);
dragDropObj.addSource('box105', true);
dragDropObj.addSource('box106', true);
dragDropObj.addSource('box107', true);
dragDropObj.addSource('box108', true);
dragDropObj.addSource('box109', true);
dragDropObj.addSource('box110', true);
dragDropObj.addSource('box111', true);
dragDropObj.addSource('box112', true);
dragDropObj.addSource('box113', true);
dragDropObj.addSource('box114', true);
dragDropObj.addSource('box115', true);
dragDropObj.addSource('box116', true);
dragDropObj.addSource('box117', true);
dragDropObj.addSource('box118', true);
dragDropObj.addSource('box119', true);
dragDropObj.addSource('box120', true);
dragDropObj.addSource('box121', true);
dragDropObj.addSource('box122', true);
dragDropObj.addSource('box123', true);
dragDropObj.addSource('box124', true);
dragDropObj.addSource('box125', true);
dragDropObj.addSource('box126', true);
dragDropObj.addSource('box127', true);
dragDropObj.addSource('box128', true);
dragDropObj.addSource('box129', true);
dragDropObj.addSource('box130', true);
dragDropObj.addSource('box131', true);
dragDropObj.addSource('box132', true);
dragDropObj.addSource('box133', true);
dragDropObj.addSource('box134', true);
dragDropObj.addSource('box135', true);
dragDropObj.addSource('box136', true);
dragDropObj.addSource('box137', true);
dragDropObj.addSource('box138', true);
dragDropObj.addSource('box139', true);
dragDropObj.addSource('box140', true);
dragDropObj.addSource('box141', true);
dragDropObj.addSource('box142', true);
dragDropObj.addSource('box143', true);
dragDropObj.addSource('box144', true);
dragDropObj.addSource('box145', true);
dragDropObj.addSource('box146', true);
dragDropObj.addSource('box147', true);
dragDropObj.addSource('box148', true);
dragDropObj.addSource('box149', true);
dragDropObj.addSource('box150', true);
dragDropObj.addSource('box151', true);
dragDropObj.addSource('box152', true);
dragDropObj.addSource('box153', true);
dragDropObj.addSource('box154', true);
dragDropObj.addSource('box155', true);
dragDropObj.addSource('box156', true);
dragDropObj.addSource('box157', true);
dragDropObj.addSource('box158', true);
dragDropObj.addSource('box159', true);
dragDropObj.addSource('box160', true);
dragDropObj.addSource('box161', true);
dragDropObj.addSource('box162', true);
dragDropObj.addSource('box163', true);
dragDropObj.addSource('box164', true);
dragDropObj.addSource('box165', true);
dragDropObj.addSource('box166', true);
dragDropObj.addSource('box167', true);
dragDropObj.addSource('box168', true);
dragDropObj.addSource('box169', true);
dragDropObj.addSource('box170', true);
dragDropObj.addSource('box171', true);
dragDropObj.addSource('box172', true);
dragDropObj.addSource('box173', true);
dragDropObj.addSource('box174', true);
dragDropObj.addSource('box175', true);
dragDropObj.addSource('box176', true);
dragDropObj.addSource('box177', true);
dragDropObj.addSource('box178', true);
dragDropObj.addSource('box179', true);
dragDropObj.addSource('box180', true);
dragDropObj.addSource('box181', true);
dragDropObj.addSource('box182', true);
dragDropObj.addSource('box183', true);
dragDropObj.addSource('box184', true);
dragDropObj.addSource('box185', true);
dragDropObj.addSource('box186', true);
dragDropObj.addSource('box187', true);
dragDropObj.addSource('box188', true);
dragDropObj.addSource('box189', true);
dragDropObj.addSource('box190', true);
dragDropObj.addSource('box191', true);
dragDropObj.addSource('box192', true);
dragDropObj.addSource('box193', true);
dragDropObj.addSource('box194', true);
dragDropObj.addSource('box195', true);
dragDropObj.addSource('box196', true);
dragDropObj.addSource('box197', true);
dragDropObj.addSource('box198', true);
dragDropObj.addSource('box199', true);
dragDropObj.addSource('box200', true);
dragDropObj.addSource('box201', true);
dragDropObj.addSource('box202', true);
dragDropObj.addSource('box203', true);
dragDropObj.addSource('box204', true);
dragDropObj.addSource('box205', true);
dragDropObj.addSource('box206', true);
dragDropObj.addSource('box207', true);
dragDropObj.addSource('box208', true);
dragDropObj.addSource('box209', true);
dragDropObj.addSource('box210', true);
dragDropObj.addSource('box211', true);
dragDropObj.addSource('box212', true);
dragDropObj.addSource('box213', true);
dragDropObj.addSource('box214', true);
dragDropObj.addSource('box215', true);
dragDropObj.addSource('box216', true);

// Assigning drop events on the countries
dragDropObj.addTarget('bob101', 'dropItems');
dragDropObj.addTarget('bob102', 'dropItems');
dragDropObj.addTarget('bob103', 'dropItems');
dragDropObj.addTarget('bob104', 'dropItems');
dragDropObj.addTarget('bob105', 'dropItems');
dragDropObj.addTarget('bob106', 'dropItems');
dragDropObj.addTarget('bob107', 'dropItems');
dragDropObj.addTarget('bob108', 'dropItems');
dragDropObj.addTarget('bob109', 'dropItems');
dragDropObj.addTarget('bob110', 'dropItems');
dragDropObj.addTarget('bob111', 'dropItems');
dragDropObj.addTarget('bob112', 'dropItems');
dragDropObj.addTarget('bob113', 'dropItems');
dragDropObj.addTarget('bob114', 'dropItems');
dragDropObj.addTarget('bob115', 'dropItems');
dragDropObj.addTarget('bob116', 'dropItems');
dragDropObj.addTarget('bob117', 'dropItems');
dragDropObj.addTarget('bob118', 'dropItems');
dragDropObj.addTarget('bob119', 'dropItems');
dragDropObj.addTarget('bob120', 'dropItems');
dragDropObj.addTarget('bob121', 'dropItems');
dragDropObj.addTarget('bob122', 'dropItems');
dragDropObj.addTarget('bob123', 'dropItems');
dragDropObj.addTarget('bob124', 'dropItems');
dragDropObj.addTarget('bob125', 'dropItems');
dragDropObj.addTarget('bob126', 'dropItems');
dragDropObj.addTarget('bob127', 'dropItems');
dragDropObj.addTarget('bob128', 'dropItems');
dragDropObj.addTarget('bob129', 'dropItems');
dragDropObj.addTarget('bob130', 'dropItems');
dragDropObj.addTarget('bob131', 'dropItems');
dragDropObj.addTarget('bob132', 'dropItems');
dragDropObj.addTarget('bob133', 'dropItems');
dragDropObj.addTarget('bob134', 'dropItems');
dragDropObj.addTarget('bob135', 'dropItems');
dragDropObj.addTarget('bob136', 'dropItems');
dragDropObj.addTarget('bob137', 'dropItems');
dragDropObj.addTarget('bob138', 'dropItems');
dragDropObj.addTarget('bob139', 'dropItems');
dragDropObj.addTarget('bob140', 'dropItems');
dragDropObj.addTarget('bob141', 'dropItems');
dragDropObj.addTarget('bob142', 'dropItems');
dragDropObj.addTarget('bob143', 'dropItems');
dragDropObj.addTarget('bob144', 'dropItems');
dragDropObj.addTarget('bob145', 'dropItems');
dragDropObj.addTarget('bob146', 'dropItems');
dragDropObj.addTarget('bob147', 'dropItems');
dragDropObj.addTarget('bob148', 'dropItems');
dragDropObj.addTarget('bob149', 'dropItems');
dragDropObj.addTarget('bob150', 'dropItems');
dragDropObj.addTarget('bob151', 'dropItems');
dragDropObj.addTarget('bob152', 'dropItems');
dragDropObj.addTarget('bob153', 'dropItems');
dragDropObj.addTarget('bob154', 'dropItems');
dragDropObj.addTarget('bob155', 'dropItems');
dragDropObj.addTarget('bob156', 'dropItems');
dragDropObj.addTarget('bob157', 'dropItems');
dragDropObj.addTarget('bob158', 'dropItems');
dragDropObj.addTarget('bob159', 'dropItems');
dragDropObj.addTarget('bob160', 'dropItems');
dragDropObj.addTarget('bob161', 'dropItems');
dragDropObj.addTarget('bob162', 'dropItems');
dragDropObj.addTarget('bob163', 'dropItems');
dragDropObj.addTarget('bob164', 'dropItems');
dragDropObj.addTarget('bob165', 'dropItems');
dragDropObj.addTarget('bob166', 'dropItems');
dragDropObj.addTarget('bob167', 'dropItems');
dragDropObj.addTarget('bob168', 'dropItems');
dragDropObj.addTarget('bob169', 'dropItems');
dragDropObj.addTarget('bob170', 'dropItems');
dragDropObj.addTarget('bob171', 'dropItems');
dragDropObj.addTarget('bob172', 'dropItems');
dragDropObj.addTarget('bob173', 'dropItems');
dragDropObj.addTarget('bob174', 'dropItems');
dragDropObj.addTarget('bob175', 'dropItems');
dragDropObj.addTarget('bob176', 'dropItems');
dragDropObj.addTarget('bob177', 'dropItems');
dragDropObj.addTarget('bob178', 'dropItems');
dragDropObj.addTarget('bob179', 'dropItems');
dragDropObj.addTarget('bob180', 'dropItems');
dragDropObj.addTarget('bob181', 'dropItems');
dragDropObj.addTarget('bob182', 'dropItems');
dragDropObj.addTarget('bob183', 'dropItems');
dragDropObj.addTarget('bob184', 'dropItems');
dragDropObj.addTarget('bob185', 'dropItems');
dragDropObj.addTarget('bob186', 'dropItems');
dragDropObj.addTarget('bob187', 'dropItems');
dragDropObj.addTarget('bob188', 'dropItems');
dragDropObj.addTarget('bob189', 'dropItems');
dragDropObj.addTarget('bob190', 'dropItems');
dragDropObj.addTarget('bob191', 'dropItems');
dragDropObj.addTarget('bob192', 'dropItems');
dragDropObj.addTarget('bob193', 'dropItems');
dragDropObj.addTarget('bob194', 'dropItems');
dragDropObj.addTarget('bob195', 'dropItems');
dragDropObj.addTarget('bob196', 'dropItems');
dragDropObj.addTarget('bob197', 'dropItems');
dragDropObj.addTarget('bob198', 'dropItems');
dragDropObj.addTarget('bob199', 'dropItems');
dragDropObj.addTarget('bob200', 'dropItems');
dragDropObj.addTarget('bob201', 'dropItems');
dragDropObj.addTarget('bob202', 'dropItems');
dragDropObj.addTarget('bob203', 'dropItems');
dragDropObj.addTarget('bob204', 'dropItems');
dragDropObj.addTarget('bob205', 'dropItems');
dragDropObj.addTarget('bob206', 'dropItems');
dragDropObj.addTarget('bob207', 'dropItems');
dragDropObj.addTarget('bob208', 'dropItems');
dragDropObj.addTarget('bob209', 'dropItems');
dragDropObj.addTarget('bob210', 'dropItems');
dragDropObj.addTarget('bob211', 'dropItems');
dragDropObj.addTarget('bob212', 'dropItems');
dragDropObj.addTarget('bob213', 'dropItems');
dragDropObj.addTarget('bob214', 'dropItems');
dragDropObj.addTarget('bob215', 'dropItems');
dragDropObj.addTarget('bob216', 'dropItems');
dragDropObj.addTarget('bob217', 'dropItems');
dragDropObj.addTarget('bob218', 'dropItems');
dragDropObj.addTarget('bob219', 'dropItems');
dragDropObj.addTarget('bob220', 'dropItems');
dragDropObj.addTarget('bob221', 'dropItems');
dragDropObj.addTarget('bob222', 'dropItems');
dragDropObj.addTarget('bob223', 'dropItems');
dragDropObj.addTarget('bob224', 'dropItems');
dragDropObj.addTarget('bob225', 'dropItems');
dragDropObj.addTarget('bob226', 'dropItems');
dragDropObj.addTarget('bob227', 'dropItems');
dragDropObj.addTarget('bob228', 'dropItems');
dragDropObj.addTarget('bob229', 'dropItems');
dragDropObj.addTarget('bob230', 'dropItems');
dragDropObj.addTarget('bob231', 'dropItems');
dragDropObj.addTarget('bob232', 'dropItems');
dragDropObj.addTarget('bob233', 'dropItems');
dragDropObj.addTarget('bob234', 'dropItems');
dragDropObj.addTarget('bob235', 'dropItems');
dragDropObj.addTarget('bob236', 'dropItems');
dragDropObj.addTarget('bob237', 'dropItems');
dragDropObj.addTarget('bob238', 'dropItems');
dragDropObj.addTarget('bob239', 'dropItems');
dragDropObj.addTarget('bob240', 'dropItems');
dragDropObj.addTarget('bob241', 'dropItems');
dragDropObj.addTarget('bob242', 'dropItems');
dragDropObj.addTarget('bob243', 'dropItems');
dragDropObj.addTarget('bob244', 'dropItems');
dragDropObj.addTarget('bob245', 'dropItems');
dragDropObj.addTarget('bob246', 'dropItems');
dragDropObj.addTarget('bob247', 'dropItems');
dragDropObj.addTarget('bob248', 'dropItems');
dragDropObj.addTarget('bob249', 'dropItems');
dragDropObj.addTarget('bob250', 'dropItems');
dragDropObj.addTarget('bob251', 'dropItems');
dragDropObj.addTarget('bob252', 'dropItems');
dragDropObj.addTarget('bob253', 'dropItems');
dragDropObj.addTarget('bob254', 'dropItems');
dragDropObj.addTarget('bob255', 'dropItems');
dragDropObj.addTarget('bob256', 'dropItems');
dragDropObj.addTarget('bob257', 'dropItems');
dragDropObj.addTarget('bob258', 'dropItems');
dragDropObj.addTarget('bob259', 'dropItems');
dragDropObj.addTarget('bob260', 'dropItems');
dragDropObj.addTarget('bob261', 'dropItems');
dragDropObj.addTarget('bob262', 'dropItems');
dragDropObj.addTarget('bob263', 'dropItems');
dragDropObj.addTarget('bob264', 'dropItems');
dragDropObj.addTarget('bob265', 'dropItems');
dragDropObj.addTarget('bob266', 'dropItems');
dragDropObj.addTarget('bob267', 'dropItems');
dragDropObj.addTarget('bob268', 'dropItems');
dragDropObj.addTarget('bob269', 'dropItems');
dragDropObj.addTarget('bob270', 'dropItems');
dragDropObj.addTarget('bob271', 'dropItems');
dragDropObj.addTarget('bob272', 'dropItems');
dragDropObj.addTarget('bob273', 'dropItems');
dragDropObj.addTarget('bob274', 'dropItems');
dragDropObj.addTarget('bob275', 'dropItems');
dragDropObj.addTarget('bob276', 'dropItems');
dragDropObj.addTarget('bob277', 'dropItems');
dragDropObj.addTarget('bob278', 'dropItems');
dragDropObj.addTarget('bob279', 'dropItems');
dragDropObj.addTarget('bob280', 'dropItems');
dragDropObj.addTarget('bob281', 'dropItems');
dragDropObj.addTarget('bob282', 'dropItems');
dragDropObj.addTarget('bob283', 'dropItems');
dragDropObj.addTarget('bob284', 'dropItems');
dragDropObj.addTarget('bob285', 'dropItems');
dragDropObj.addTarget('bob286', 'dropItems');
dragDropObj.addTarget('bob287', 'dropItems');
dragDropObj.addTarget('bob288', 'dropItems');
dragDropObj.addTarget('bob289', 'dropItems');
dragDropObj.addTarget('bob290', 'dropItems');
dragDropObj.addTarget('bob291', 'dropItems');
dragDropObj.addTarget('bob292', 'dropItems');
dragDropObj.addTarget('bob293', 'dropItems');
dragDropObj.addTarget('bob294', 'dropItems');
dragDropObj.addTarget('bob295', 'dropItems');
dragDropObj.addTarget('bob296', 'dropItems');
dragDropObj.addTarget('bob297', 'dropItems');
dragDropObj.addTarget('bob298', 'dropItems');
dragDropObj.addTarget('bob299', 'dropItems');
dragDropObj.addTarget('bob300', 'dropItems');
dragDropObj.addTarget('bob301', 'dropItems');
dragDropObj.addTarget('bob302', 'dropItems');
dragDropObj.addTarget('bob303', 'dropItems');
dragDropObj.addTarget('bob304', 'dropItems');
dragDropObj.addTarget('bob305', 'dropItems');
dragDropObj.addTarget('bob306', 'dropItems');
dragDropObj.addTarget('bob307', 'dropItems');
dragDropObj.addTarget('bob308', 'dropItems');
dragDropObj.addTarget('bob309', 'dropItems');
dragDropObj.addTarget('bob310', 'dropItems');
dragDropObj.addTarget('bob311', 'dropItems');
dragDropObj.addTarget('bob312', 'dropItems');
dragDropObj.addTarget('bob313', 'dropItems');
dragDropObj.addTarget('bob314', 'dropItems');
dragDropObj.addTarget('bob315', 'dropItems');
dragDropObj.addTarget('bob316', 'dropItems');

dragDropObj.addTarget('capitals', 'dropItems'); // Set <div id="leftColumn"> as a drop target. Call function dropItems on drop


dragDropObj.init();	// Initizlizing drag and drop object