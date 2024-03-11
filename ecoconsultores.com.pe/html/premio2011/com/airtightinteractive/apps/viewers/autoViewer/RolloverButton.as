class com.airtightinteractive.apps.viewers.autoViewer.RolloverButton
{
    var mClip_mc, mEnabled, mVisible, mDown, __get__buttonFrame, __set__buttonFrame, __get__height, __get__width;
    function RolloverButton(symbolName, target)
    {
        mClip_mc = target.attachMovie(symbolName, symbolName, target.getNextHighestDepth());
        mClip_mc.onPress = mx.utils.Delegate.create(this, onPress);
        mClip_mc.onRelease = mx.utils.Delegate.create(this, onRelease);
        mClip_mc.onReleaseOutside = mx.utils.Delegate.create(this, onReleaseOutside);
        mEnabled = true;
        mVisible = false;
        mClip_mc._alpha = 0;
        mDown = false;
    } // End of the function
    function onPress()
    {
        if (!mEnabled)
        {
            return;
        } // end if
        mDown = true;
        mClip_mc._x = mClip_mc._x + 1;
        mClip_mc._y = mClip_mc._y + 1;
    } // End of the function
    function onRelease()
    {
        if (!mEnabled)
        {
            return;
        } // end if
        mClip_mc._x = mClip_mc._x - 1;
        mClip_mc._y = mClip_mc._y - 1;
        mDown = false;
        this.doAction();
    } // End of the function
    function onReleaseOutside()
    {
        if (!mEnabled)
        {
            return;
        } // end if
        mClip_mc._x = mClip_mc._x - 1;
        mClip_mc._y = mClip_mc._y - 1;
        mDown = false;
    } // End of the function
    function doAction()
    {
    } // End of the function
    function setBtnPosn(x, y)
    {
        mClip_mc._x = x;
        mClip_mc._y = y;
    } // End of the function
    function set buttonFrame(f)
    {
        mClip_mc.mcBtn.gotoAndStop(f);
        //return (this.buttonFrame());
        null;
    } // End of the function
    function get width()
    {
        return (mClip_mc.mcBtn._width);
    } // End of the function
    function get height()
    {
        return (mClip_mc.mcBtn._height);
    } // End of the function
    function setEnabled(enabled)
    {
        mEnabled = enabled;
        if (!enabled)
        {
            this.doShow(false);
        } // end if
        mClip_mc.useHandCursor = mEnabled;
    } // End of the function
    function show(show)
    {
        if (!mEnabled)
        {
            return;
        } // end if
        if (mClip_mc.hitTest(_root._xmouse, _root._ymouse) && show == false)
        {
            return;
        } // end if
        this.doShow(show);
    } // End of the function
    function doShow(show)
    {
        if (show == mVisible)
        {
            return;
        } // end if
        if (show)
        {
            new mx.transitions.Tween(mClip_mc, "_alpha", null, 0, 95, 5, false);
        }
        else
        {
            new mx.transitions.Tween(mClip_mc, "_alpha", null, 95, 0, 5, false);
        } // end else if
        mVisible = show;
    } // End of the function
} // End of Class
