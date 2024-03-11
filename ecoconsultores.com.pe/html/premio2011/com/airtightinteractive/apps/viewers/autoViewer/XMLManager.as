class com.airtightinteractive.apps.viewers.autoViewer.XMLManager
{
    var mStageManager, xmlResults, mImageCount, aImageFileNames, aImageWidths, aImageHeights, aImageCaptions;
    static var instance;
    function XMLManager()
    {
        mStageManager = com.airtightinteractive.apps.viewers.autoViewer.StageManager.getInstance();
        xmlResults = new XML();
        xmlResults.ignoreWhite = true;
        xmlResults.onLoad = mx.utils.Delegate.create(this, onXMLLoaded);
    } // End of the function
    static function getInstance()
    {
        if (com.airtightinteractive.apps.viewers.autoViewer.XMLManager.instance == null)
        {
            instance = new com.airtightinteractive.apps.viewers.autoViewer.XMLManager();
        } // end if
        return (com.airtightinteractive.apps.viewers.autoViewer.XMLManager.instance);
    } // End of the function
    function loadXML()
    {
        var _loc3 = com.airtightinteractive.apps.viewers.autoViewer.Options.XMLPath;
        if (_root.xmlURL != undefined)
        {
            _loc3 = _root.xmlURL;
        } // end if
        xmlResults.load(_loc3);
    } // End of the function
    function onXMLLoaded(success)
    {
        mImageCount = 0;
        aImageFileNames = [];
        aImageWidths = [];
        aImageHeights = [];
        aImageCaptions = [];
        if (success)
        {
            var _loc4 = xmlResults.firstChild;
            mImageCount = Number(_loc4.childNodes.length);
            var _loc6 = Number(_loc4.attributes.frameColor);
            if (this.isValidNumber(_loc6))
            {
                frameColor = _loc6;
            } // end if
            var _loc5 = Number(_loc4.attributes.frameWidth);
            if (this.isValidNumber(_loc5))
            {
                frameWidth = _loc5;
            } // end if
            var _loc7 = Number(_loc4.attributes.imagePadding);
            if (this.isValidNumber(_loc7))
            {
                imagePadding = _loc7;
            } // end if
            var _loc8 = Number(_loc4.attributes.displayTime) * 1000;
            if (this.isValidNumber(_loc8))
            {
                displayTime = _loc8;
            } // end if
            enableRightClickOpen = this.getBoolean(_loc4.attributes.enableRightClickOpen);
            if (mImageCount < 1)
            {
                mStageManager.showNoImagesMessage();
            }
            else
            {
                for (var _loc3 = 0; _loc3 < mImageCount; ++_loc3)
                {
                    var _loc2 = _loc4.childNodes[_loc3];
                    aImageFileNames.push(_loc2.childNodes[0].firstChild.nodeValue);
                    aImageCaptions.push(_loc2.childNodes[1].firstChild.nodeValue);
                    aImageWidths.push(Number(_loc2.childNodes[2].firstChild.nodeValue));
                    aImageHeights.push(Number(_loc2.childNodes[3].firstChild.nodeValue));
                } // end of for
                mStageManager.createImages();
            } // end else if
        }
        else
        {
            mStageManager.showErrorMessage();
        } // end else if
    } // End of the function
    function isValidNumber(x)
    {
        return (!(isNaN(x) || x == undefined));
    } // End of the function
    function getBoolean(s)
    {
        if (s.toLowerCase() == "true")
        {
            return (true);
        } // end if
        return (false);
    } // End of the function
    var frameColor = 16777215;
    var frameWidth = 15;
    var imagePadding = 20;
    var displayTime = 6000;
    var enableRightClickOpen = false;
} // End of Class
