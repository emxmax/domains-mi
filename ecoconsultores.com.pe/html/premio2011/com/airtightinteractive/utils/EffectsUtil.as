class com.airtightinteractive.utils.EffectsUtil
{
    function EffectsUtil()
    {
    } // End of the function
    static function drawShadow(clip, distance, strengthPercent)
    {
        var _loc2 = 45;
        var _loc5 = 0;
        var _loc12 = 1;
        var _loc8 = 5;
        var _loc7 = 5;
        var _loc10 = strengthPercent / 100;
        var _loc3 = 1;
        var _loc6 = false;
        var _loc11 = false;
        var _loc9 = false;
        var _loc4 = new flash.filters.DropShadowFilter(distance, _loc2, _loc5, _loc12, _loc8, _loc7, _loc10, _loc3, _loc6, _loc11, _loc9);
        var _loc1 = clip.filters;
        _loc1.push(_loc4);
        clip.filters = _loc1;
    } // End of the function
    static function drawGlow(clip, blur, strengthPercent)
    {
        var _loc4 = 0;
        var _loc8 = 1;
        var _loc6 = strengthPercent / 100;
        var _loc2 = 1;
        var _loc5 = false;
        var _loc7 = false;
        var _loc3 = new flash.filters.GlowFilter(_loc4, _loc8, blur, blur, _loc6, _loc2, _loc5, _loc7);
        var _loc1 = clip.filters;
        _loc1.push(_loc3);
        clip.filters = _loc1;
    } // End of the function
} // End of Class
