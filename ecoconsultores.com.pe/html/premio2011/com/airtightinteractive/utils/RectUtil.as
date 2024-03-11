class com.airtightinteractive.utils.RectUtil
{
    function RectUtil()
    {
    } // End of the function
    static function rectangle(clip_mc, x1, y1, x2, y2)
    {
        clip_mc.moveTo(x1, y1);
        clip_mc.lineTo(x2, y1);
        clip_mc.lineTo(x2, y2);
        clip_mc.lineTo(x1, y2);
        clip_mc.lineTo(x1, y1);
    } // End of the function
    static function hollowRectangle(clip_mc, x1, y1, x2, y2, frameWidth)
    {
        com.airtightinteractive.utils.RectUtil.rectangle(clip_mc, x1, y1, x2, y2);
        com.airtightinteractive.utils.RectUtil.rectangle(clip_mc, x1 + frameWidth, y1 + frameWidth, x2 - frameWidth, y2 - frameWidth);
    } // End of the function
} // End of Class
