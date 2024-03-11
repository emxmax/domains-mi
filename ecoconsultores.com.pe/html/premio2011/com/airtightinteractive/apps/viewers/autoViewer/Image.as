class com.airtightinteractive.apps.viewers.autoViewer.Image
{
    var mStageManager, mXMLManager, mIndex, mJPGWidth, mJPGHeight, mCaption, mClip_mc, mLoaded, mImageLoadError, mFrame_mc, mcLoader, loader_mcl, imageURL, mColorTrans, mClipTrans, mColorTween, mcCaption, mCaptionTween, mImgLoadStatus_mc, mHeight, mWidth, mError_mc, __get__height, __get__width;
    function Image(target, index, imageURL, width, height, caption)
    {
        mStageManager = com.airtightinteractive.apps.viewers.autoViewer.StageManager.getInstance();
        mXMLManager = com.airtightinteractive.apps.viewers.autoViewer.XMLManager.getInstance();
        mIndex = index;
        mJPGWidth = width + mXMLManager.frameWidth * 2;
        mJPGHeight = height + mXMLManager.frameWidth * 2;
        mCaption = caption;
        if (mCaption == "undefined" || mCaption == undefined)
        {
            mCaption = "";
        } // end if
        var _loc2 = target.getNextHighestDepth();
        mClip_mc = target.createEmptyMovieClip("image" + _loc2, _loc2);
        mLoaded = false;
        mImageLoadError = false;
        mFrame_mc = mClip_mc.createEmptyMovieClip("frame", mClip_mc.getNextHighestDepth());
        mcLoader = mClip_mc.createEmptyMovieClip("loader", mClip_mc.getNextHighestDepth());
        loader_mcl = new MovieClipLoader();
        loader_mcl.addListener(this);
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.preloadAllImages)
        {
            loader_mcl.loadClip(imageURL, mcLoader);
        } // end if
        this.imageURL = imageURL;
        mcLoader._x = mXMLManager.frameWidth;
        mcLoader._y = mXMLManager.frameWidth;
        mColorTrans = new flash.geom.ColorTransform();
        mClipTrans = new flash.geom.Transform(mcLoader);
        mColorTween = new mx.transitions.Tween(mcLoader, "offset", com.airtightinteractive.apps.viewers.autoViewer.Image.sTweenFunc, com.airtightinteractive.apps.viewers.autoViewer.Options.initialBrightness, com.airtightinteractive.apps.viewers.autoViewer.Options.initialBrightness, 1, false);
        mColorTween.onMotionChanged = mx.utils.Delegate.create(this, setColorOffset);
        mColorTween.onMotionFinished = mx.utils.Delegate.create(this, onColorTweenDone);
        mcCaption = mClip_mc.createEmptyMovieClip("caption", mClip_mc.getNextHighestDepth());
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.showImageNumbers)
        {
            mcCaption.attachMovie("Caption", "mcIndex", mcCaption.getNextHighestDepth());
            mcCaption.mcIndex.txtCaption.html = true;
            mcCaption.mcIndex.txtCaption.htmlText = "<font size=\'" + com.airtightinteractive.apps.viewers.autoViewer.Options.imageNumberFontSize + "\' " + "color=\'" + com.airtightinteractive.apps.viewers.autoViewer.Options.imageNumberColor + "\'>" + (index + 1) + " / " + mStageManager.__get__imageCount() + "</font>";
        } // end if
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.showCaptions)
        {
            mcCaption.attachMovie("Caption", "mcCaption", mcCaption.getNextHighestDepth());
            mcCaption.mcCaption.txtCaption.html = true;
            mcCaption.mcCaption.txtCaption.wordWrap = true;
            mcCaption.mcCaption.txtCaption.multiline = true;
            mcCaption.mcCaption.txtCaption.autosize = true;
            mcCaption.mcCaption.txtCaption.htmlText = mCaption;
        } // end if
        mcCaption._x = com.airtightinteractive.apps.viewers.autoViewer.Options.captionPadding + mXMLManager.frameWidth;
        mcCaption._y = com.airtightinteractive.apps.viewers.autoViewer.Options.captionPadding + mXMLManager.frameWidth;
        mCaptionTween = new mx.transitions.Tween(mcCaption, "_alpha", null, 0, 0, 1, false);
        mImgLoadStatus_mc = mClip_mc.createEmptyMovieClip("mcLoadbar", mClip_mc.getNextHighestDepth());
        com.airtightinteractive.utils.EffectsUtil.drawShadow(mImgLoadStatus_mc, 5, 35);
        com.airtightinteractive.utils.EffectsUtil.drawGlow(mImgLoadStatus_mc, 5, 30);
        new mx.transitions.Tween(mImgLoadStatus_mc, "_alpha", mx.transitions.easing.None.easeNone, 0, 100, 5, false);
    } // End of the function
    function setColorOffset()
    {
        mColorTrans.redOffset = mcLoader.offset;
        mColorTrans.blueOffset = mcLoader.offset;
        mColorTrans.greenOffset = mcLoader.offset;
        mClipTrans.colorTransform = mColorTrans;
    } // End of the function
    function onColorTweenDone()
    {
        if (mcLoader.offset == 0)
        {
            mCaptionTween.continueTo(100, 5);
        } // end if
    } // End of the function
    function onLoadProgress(target, bytesLoaded, bytesTotal)
    {
        var _loc2 = -Math.round(100 - percent) * 3.600000E+000;
        var percent = bytesLoaded / bytesTotal * 100;
        mImgLoadStatus_mc.clear();
        _loc2 = percent * 3.600000E+000;
        _loc2 = -Math.round(100 - percent) * 3.600000E+000;
        mImgLoadStatus_mc.beginFill(mXMLManager.frameColor, 95);
        com.airtightinteractive.utils.DrawUtil.wedge(mImgLoadStatus_mc, mWidth / 2, mHeight / 2, 90, -_loc2, 30);
        mImgLoadStatus_mc.endFill();
    } // End of the function
    function loadImage()
    {
        if (!mLoaded)
        {
            loader_mcl.loadClip(imageURL, mcLoader);
        } // end if
    } // End of the function
    function onLoadInit()
    {
        mcLoader.forceSmoothing = com.airtightinteractive.apps.viewers.autoViewer.Options.useSmoothing;
        mLoaded = true;
        loader_mcl.removeListener(this);
        mImgLoadStatus_mc.clear();
        this.setSize(mWidth, mHeight);
        new mx.transitions.Tween(mFrame_mc, "_alpha", mx.transitions.easing.None.easeNone, 0, 100, 5, false);
        if (mIndex == mStageManager.__get__currentImageIndex())
        {
            this.show();
        }
        else
        {
            this.hide();
        } // end else if
    } // End of the function
    function onLoadError()
    {
        mImgLoadStatus_mc.clear();
        mImageLoadError = true;
        mError_mc = mClip_mc.attachMovie("ErrorIcon", "error", mClip_mc.getNextHighestDepth());
        mError_mc._x = mWidth / 2;
        mError_mc._y = mHeight / 2;
    } // End of the function
    function show()
    {
        if (!mLoaded)
        {
            return;
        } // end if
        mColorTween.continueTo(0, com.airtightinteractive.apps.viewers.autoViewer.Options.colorFadeAnimationLength);
        mcLoader.onRelease = null;
        mcLoader.useHandCursor = false;
    } // End of the function
    function hide()
    {
        mColorTween.continueTo(com.airtightinteractive.apps.viewers.autoViewer.Options.unselectedBrightness, com.airtightinteractive.apps.viewers.autoViewer.Options.colorFadeAnimationLength);
        mCaptionTween.continueTo(0, 1);
        mcLoader.onRelease = mx.utils.Delegate.create(this, onRelease);
        mcLoader.useHandCursor = true;
    } // End of the function
    function onRelease()
    {
        mStageManager.showImage(mIndex);
    } // End of the function
    function setSize(w, h)
    {
        var _loc2 = w / h;
        var _loc3 = mJPGWidth / mJPGHeight;
        mWidth = mJPGWidth;
        mHeight = mJPGHeight;
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.enableImageDownScaling)
        {
            if (_loc3 > _loc2)
            {
                mWidth = Math.min(w, mJPGWidth);
                mHeight = mJPGHeight * (mWidth / mJPGWidth);
            }
            else
            {
                mHeight = Math.min(h, mJPGHeight);
                mWidth = mJPGWidth * (mHeight / mJPGHeight);
            } // end else if
            mHeight = Math.round(mHeight);
            mWidth = Math.round(mWidth);
        } // end if
        if (com.airtightinteractive.apps.viewers.autoViewer.Options.enableImageUpScaling)
        {
            if (_loc3 > _loc2)
            {
                mWidth = Math.max(w, mJPGWidth);
                mHeight = mJPGHeight * (mWidth / mJPGWidth);
            }
            else
            {
                mHeight = Math.max(h, mJPGHeight);
                mWidth = mJPGWidth * (mHeight / mJPGHeight);
            } // end else if
            mHeight = Math.round(mHeight);
            mWidth = Math.round(mWidth);
        } // end if
        if (mLoaded)
        {
            mcLoader._width = mWidth - mXMLManager.frameWidth * 2;
            mcLoader._height = mHeight - mXMLManager.frameWidth * 2;
            mFrame_mc.clear();
            mFrame_mc.beginFill(mXMLManager.frameColor, 100);
            com.airtightinteractive.utils.RectUtil.rectangle(mFrame_mc, 0, 0, mWidth, mHeight);
            mFrame_mc.endFill();
        } // end if
        var _loc5 = mWidth * 3 / 4;
        var _loc4 = mHeight * 3 / 4;
        mcCaption.mcCaption.txtCaption._width = _loc5;
        mcCaption.mcCaption.txtCaption._height = _loc4;
        mcCaption.mcIndex.txtCaption._x = mWidth - (com.airtightinteractive.apps.viewers.autoViewer.Options.captionPadding * 2 + mcCaption.mcIndex.txtCaption.textWidth + mXMLManager.frameWidth * 2);
        mError_mc._x = mWidth / 2;
        mError_mc._y = mHeight / 2;
    } // End of the function
    function setPosn(x, y)
    {
        mClip_mc._x = x;
        mClip_mc._y = y;
    } // End of the function
    function get width()
    {
        return (mWidth);
    } // End of the function
    function get height()
    {
        return (mHeight);
    } // End of the function
    static var sTweenFunc = mx.transitions.easing.Strong.easeInOut;
} // End of Class
