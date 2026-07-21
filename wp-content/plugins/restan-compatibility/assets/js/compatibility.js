/**
 * Restan Compatibility Layer
 * compatibility.js
 *
 * Main bootstrap for all compatibility modules.
 *
 * Version: 1.0.1
 */

document.addEventListener("DOMContentLoaded",function(){

    if(window.RestanCompatibility){

        RestanCompatibility.log(
            "Compatibility Layer Started",
            RestanCompatibility.version
        );

        Object.values(RestanCompatibility.modules).forEach(function(module){

            if(module && typeof module.init === "function"){

                module.init();

            }

        });

    }

});