class com.airtightinteractive.utils.DrawUtil
{
    function DrawUtil()
    {
    } // End of the function
    static function wedge(clip_mc, x, y, startAngle, arc, radius, yRadius)
    {
        clip_mc.moveTo(x, y);
        if (yRadius == undefined)
        {
            yRadius = radius;
        } // end if
        var _loc19;
        var _loc1;
        var _loc2;
        var _loc4;
        var _loc13;
        var _loc18;
        var _loc17;
        var _loc12;
        var _loc10;
        var _loc11;
        var _loc9;
        if (Math.abs(arc) > 360)
        {
            arc = 360;
        } // end if
        _loc13 = Math.ceil(Math.abs(arc) / 45);
        _loc19 = arc / _loc13;
        _loc1 = -_loc19 / 180 * 3.141593E+000;
        _loc2 = -startAngle / 180 * 3.141593E+000;
        if (_loc13 > 0)
        {
            _loc18 = x + Math.cos(startAngle / 180 * 3.141593E+000) * radius;
            _loc17 = y + Math.sin(-startAngle / 180 * 3.141593E+000) * yRadius;
            clip_mc.lineTo(_loc18, _loc17);
            for (var _loc3 = 0; _loc3 < _loc13; ++_loc3)
            {
                _loc2 = _loc2 + _loc1;
                _loc4 = _loc2 - _loc1 / 2;
                _loc12 = x + Math.cos(_loc2) * radius;
                _loc10 = y + Math.sin(_loc2) * yRadius;
                _loc11 = x + Math.cos(_loc4) * (radius / Math.cos(_loc1 / 2));
                _loc9 = y + Math.sin(_loc4) * (yRadius / Math.cos(_loc1 / 2));
                clip_mc.curveTo(_loc11, _loc9, _loc12, _loc10);
            } // end of for
            clip_mc.lineTo(x, y);
        } // end if
    } // End of the function
    static function roundedRectangle(clip_mc, x, y, x2, y2, cornerRadius)
    {
        if (arguments.length < 4)
        {
            return;
        } // end if
        var _loc13 = x2 - x;
        var _loc12 = y2 - y;
        if (cornerRadius > 0)
        {
            var _loc3;
            var _loc4;
            var _loc9;
            var _loc8;
            var _loc11;
            var _loc10;
            if (cornerRadius > Math.min(_loc13, _loc12) / 2)
            {
                cornerRadius = Math.min(_loc13, _loc12) / 2;
            } // end if
            _loc3 = 7.853982E-001;
            clip_mc.moveTo(x + cornerRadius, y);
            clip_mc.lineTo(x + _loc13 - cornerRadius, y);
            _loc4 = -1.570796E+000;
            _loc9 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            clip_mc.lineTo(x + _loc13, y + _loc12 - cornerRadius);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + _loc13 - cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            clip_mc.lineTo(x + cornerRadius, y + _loc12);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + _loc12 - cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            clip_mc.lineTo(x, y + cornerRadius);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
            _loc4 = _loc4 + _loc3;
            _loc9 = x + cornerRadius + Math.cos(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc8 = y + cornerRadius + Math.sin(_loc4 + _loc3 / 2) * cornerRadius / Math.cos(_loc3 / 2);
            _loc11 = x + cornerRadius + Math.cos(_loc4 + _loc3) * cornerRadius;
            _loc10 = y + cornerRadius + Math.sin(_loc4 + _loc3) * cornerRadius;
            clip_mc.curveTo(_loc9, _loc8, _loc11, _loc10);
        }
        else
        {
            clip_mc.moveTo(x, y);
            clip_mc.lineTo(x + _loc13, y);
            clip_mc.lineTo(x + _loc13, y + _loc12);
            clip_mc.lineTo(x, y + _loc12);
            clip_mc.lineTo(x, y);
        } // end else if
    } // End of the function
} // End of Class
