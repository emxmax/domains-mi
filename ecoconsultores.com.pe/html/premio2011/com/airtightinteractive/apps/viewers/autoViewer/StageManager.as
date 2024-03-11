class com.airtightinteractive.apps.viewers.autoViewer.StageManager
{
    var mXMLManager, mClip_mc, mImageArea_mc, aImages, aImageXPosns, mCurrentImageIndex, mPagingTwn, mNextBtn, mBackBtn, mPlayBtn, mLogoBar_mc, mResize_int, mPlaying, mPlay_int, mCheckIdle_int, __get__currentImageIndex, __get__imageCount;
    static var instance;
    function StageManager()
    {
    } // End of the function
    static function getInstance()
    {
        if (com.airtightinteractive.apps.viewers.autoViewer.StageManager.instance == null)
        {
            instance = new com.airtightinteractive.apps.viewers.autoViewer.StageManager();
        } // end if
        return (com.airtightinteractive.apps.viewers.autoViewer.StageManager.instance);
    } // End of the function
    function init(target)
    {
        mXMLManager = com.airtightinteractive.apps.viewers.autoViewer.XMLManager.getInstance();
        mClip_mc = target;
        mImageArea_mc = mClip_mc.createEmptyMovieClip("imgArea", mClip_mc.getNextHighestDepth());
        aImages = [];
        aImageXPosns = [];
        mImageCount = 0;
        mCurrentImageIndex = 0;
        if (_root.langAbout != undefined)
        {
            langAbout = _root.langAbout;
        } // end if
        if (_root.langOpenImage != undefined)
        {
            langOpenImage = _root.langOpenImage;
        } // end if
        Stage.addListener(this);
        Key.addListener(this);
        mPagingTwn = new mx.transitions.Tween(mImageArea_mc, "_x", mx.transitions.easing.Strong.easeInOut, 0, 0, com.airtightinteractive.apps.viewers.autoViewer.Options.slideAnimationLength, false);
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.enableArrowButtons)
        {
            mNextBtn = new com.airtightinteractive.apps.viewers.autoViewer.RolloverButton("ButtonNext", mClip_mc);
            mNextBtn.doAction = mx.utils.Delegate.create(this, showNext);
            mBackBtn = new com.airtightinteractive.apps.viewers.autoViewer.RolloverButton("ButtonBack", mClip_mc);
            mBackBtn.doAction = mx.utils.Delegate.create(this, showPrev);
        } // end if
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.enablePlayButton)
        {
            mPlayBtn = new com.airtightinteractive.apps.viewers.autoViewer.RolloverButton("ButtonPlay", mClip_mc);
            mPlayBtn.doAction = mx.utils.Delegate.create(this, togglePlay);
            mPlayBtn.__set__buttonFrame(2);
        } // end if
        mBackBtn.setEnabled(false);
        if (!com.airtightinteractive.apps.viewers.autoViewer.StageManager.IS_PRO)
        {
            mLogoBar_mc = mClip_mc.attachMovie("Logo", "mcLogo", mClip_mc.getNextHighestDepth());
            mLogoBar_mc._visible = false;
            mLogoBar_mc.onRelease = mx.utils.Delegate.create(this, onLogoClick);
        } // end if
        this.doLayout();
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.hideControlsOnRollOut)
        {
            mClip_mc.onMouseMove = mx.utils.Delegate.create(this, onMouseMove);
        }
        else
        {
            this.showControls(true);
        } // end else if
        mXMLManager.loadXML();
    } // End of the function
    function onLogoClick()
    {
        getURL(com.airtightinteractive.apps.viewers.autoViewer.StageManager.linkURL, "autoviewer");
    } // End of the function
    function createImages()
    {
        var _loc3 = new ContextMenu();
        _loc3.hideBuiltInItems();
        if (mXMLManager.enableRightClickOpen)
        {
            _loc3.customItems.push(new ContextMenuItem(langOpenImage + "...", mx.utils.Delegate.create(this, openImage)));
        } // end if
        if (!com.airtightinteractive.apps.viewers.autoViewer.StageManager.IS_PRO)
        {
            _loc3.customItems.push(new ContextMenuItem(langAbout + " AutoViewer v" + com.airtightinteractive.apps.viewers.autoViewer.StageManager.VERSION + "...", mx.utils.Delegate.create(this, onLogoClick)));
        } // end if
        mClip_mc.menu = _loc3;
        mClip_mc.mcLogo._visible = false;
        mImageCount = mXMLManager.mImageCount;
        for (var _loc2 = 0; _loc2 < mImageCount; ++_loc2)
        {
            aImages[_loc2] = new com.airtightinteractive.apps.viewers.autoViewer.Image(mImageArea_mc, _loc2, mXMLManager.aImageFileNames[_loc2], mXMLManager.aImageWidths[_loc2], mXMLManager.aImageHeights[_loc2], mXMLManager.aImageCaptions[_loc2]);
        } // end of for
        this.doLayout();
        mLogoBar_mc._visible = true;
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.playAtStart)
        {
            this.setPlaying(true);
        } // end if
        this.showImage();
    } // End of the function
    function onResize()
    {
        if (mResize_int == null)
        {
            mResize_int = setInterval(mx.utils.Delegate.create(this, doLayout), com.airtightinteractive.apps.viewers.autoViewer.StageManager.sResizeTime);
        } // end if
    } // End of the function
    function doLayout()
    {
        clearInterval(mResize_int);
        mResize_int = null;
        var _loc6;
        var _loc5;
        if (_global.AVStageWidth != undefined)
        {
            _loc6 = _global.AVStageWidth;
            _loc5 = _global.AVStageHeight;
        }
        else
        {
            _loc6 = Stage.width;
            _loc5 = Stage.height;
        } // end else if
        mLogoBar_mc._x = Math.round(_loc6 - mLogoBar_mc._width - 10 - com.airtightinteractive.apps.viewers.autoViewer.XMLManager.getInstance().frameWidth);
        mLogoBar_mc._y = Math.round(_loc5 - mLogoBar_mc._height - 10 - com.airtightinteractive.apps.viewers.autoViewer.XMLManager.getInstance().frameWidth);
        mBackBtn.setBtnPosn(Math.round(com.airtightinteractive.apps.viewers.autoViewer.Options.controlsHPadding + mBackBtn.__get__width() / 2), Math.round(_loc5 / 2));
        mNextBtn.setBtnPosn(Math.round(_loc6 - mNextBtn.__get__width() / 2 - com.airtightinteractive.apps.viewers.autoViewer.Options.controlsHPadding), Math.round(_loc5 / 2));
        mPlayBtn.setBtnPosn(_loc6 / 2, _loc5 - com.airtightinteractive.apps.viewers.autoViewer.XMLManager.getInstance().frameWidth - com.airtightinteractive.apps.viewers.autoViewer.Options.controlsVPadding - mPlayBtn.__get__width() / 2);
        if (mImageCount == 0)
        {
            return;
        } // end if
        var _loc4 = 0;
        for (var _loc3 = 0; _loc3 < mImageCount; ++_loc3)
        {
            aImages[_loc3].setSize(_loc6, _loc5);
            if (com.airtightinteractive.apps.viewers.autoViewer.Options.leftAlignImages)
            {
                aImageXPosns[_loc3] = _loc4;
            }
            else
            {
                aImageXPosns[_loc3] = _loc4 - Math.round((_loc6 - aImages[_loc3].width) / 2);
            } // end else if
            aImages[_loc3].setPosn(_loc4, Math.round((_loc5 - aImages[_loc3].height) / 2));
            _loc4 = _loc4 + (aImages[_loc3].width + mXMLManager.imagePadding);
        } // end of for
        var _loc7 = -aImageXPosns[mCurrentImageIndex];
        mPagingTwn.continueTo(_loc7, 1);
        mPagingTwn.fforward();
    } // End of the function
    function showImage(index, instant)
    {
        if (index < 0)
        {
            return;
        } // end if
        if (index >= mImageCount)
        {
            if (!com.airtightinteractive.apps.viewers.autoViewer.Options.loopAutoplay)
            {
                return;
            }
            else
            {
                index = 0;
            } // end if
        } // end else if
        aImages[mCurrentImageIndex].hide();
        var _loc3 = -aImageXPosns[mCurrentImageIndex];
        mPagingTwn.continueTo(_loc3, 1);
        mPagingTwn.fforward();
        mCurrentImageIndex = index;
        _loc3 = -aImageXPosns[mCurrentImageIndex];
        mPagingTwn.continueTo(_loc3, com.airtightinteractive.apps.viewers.autoViewer.Options.slideAnimationLength);
        aImages[mCurrentImageIndex].show();
        mBackBtn.setEnabled(mCurrentImageIndex != 0);
        mPlayBtn.setEnabled(true);
        if (!com.airtightinteractive.apps.viewers.autoViewer.Options.loopAutoplay)
        {
            mNextBtn.setEnabled(mCurrentImageIndex != mImageCount - 1);
        } // end if
        if (!com.airtightinteractive.apps.viewers.autoViewer.Options.preloadAllImages)
        {
            aImages[mCurrentImageIndex].loadImage();
        } // end if
    } // End of the function
    function showNext()
    {
        this.setPlaying(false);
        this.showImage(mCurrentImageIndex + 1);
    } // End of the function
    function showPrev()
    {
        this.setPlaying(false);
        this.showImage(mCurrentImageIndex - 1);
    } // End of the function
    function onKeyDown()
    {
        if (Key.isDown(37))
        {
            this.showPrev();
        }
        else if (Key.isDown(39))
        {
            this.showNext();
        }
        else if (Key.isDown(36))
        {
            this.showImage(0);
        }
        else if (Key.isDown(35))
        {
            this.showImage(mImageCount - 1);
        }
        else if (Key.isDown(32))
        {
            this.togglePlay();
        } // end else if
    } // End of the function
    function togglePlay()
    {
        this.setPlaying(!mPlaying);
        if (mPlaying)
        {
            this.showImage(mCurrentImageIndex + 1);
        } // end if
    } // End of the function
    function setPlaying(play)
    {
        mPlaying = play;
        clearInterval(mPlay_int);
        mPlayBtn.__set__buttonFrame(mPlaying ? (1) : (2));
        if (mPlaying)
        {
            mPlay_int = setInterval(mx.utils.Delegate.create(this, doStep), mXMLManager.displayTime);
        } // end if
    } // End of the function
    function doStep()
    {
        if (mCurrentImageIndex == mImageCount - 1 && !com.airtightinteractive.apps.viewers.autoViewer.Options.loopAutoplay)
        {
            this.setPlaying(false);
        }
        else
        {
            this.showImage(mCurrentImageIndex + 1);
        } // end else if
    } // End of the function
    function showControls(show)
    {
        mNextBtn.show(show);
        mBackBtn.show(show);
        mPlayBtn.show(show);
    } // End of the function
    function checkIdle()
    {
        var _loc4 = _root._xmouse;
        var _loc3 = _root._ymouse;
        if (Math.abs(_loc4 - mLastMouseX) < mIdleDistance && Math.abs(_loc3 - mLastMouseY) < mIdleDistance)
        {
            this.showControls(false);
        } // end if
    } // End of the function
    function onMouseMove()
    {
        this.showControls(true);
        clearInterval(mCheckIdle_int);
        mCheckIdle_int = setInterval(mx.utils.Delegate.create(this, checkIdle), mCheckIdleTime);
        mLastMouseX = _root._xmouse;
        mLastMouseY = _root._ymouse;
    } // End of the function
    function openImage()
    {
        getURL(mXMLManager.aImageFileNames[mCurrentImageIndex], "image_result");
    } // End of the function
    function showNoImagesMessage()
    {
        trace ("No images specified in XML doc");
    } // End of the function
    function showErrorMessage()
    {
        trace ("Error loading XML doc");
    } // End of the function
    function get currentImageIndex()
    {
        return (mCurrentImageIndex);
    } // End of the function
    function get imageCount()
    {
        return (mImageCount);
    } // End of the function
    static var IS_PRO = false;
    static var VERSION = "1.4";
    static var sResizeTime = 50;
    static var linkURL = "http://www.airtightinteractive.com/projects/autoviewer/";
    var mImageCount = 0;
    var langAbout = "About";
    var langOpenImage = "Open Image in New Window";
    var mCheckIdleTime = 1200;
    var mIdleDistance = 10;
    var mLastMouseY = 0;
    var mLastMouseX = 0;
} // End of Class
