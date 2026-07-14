/**
 * Logo Repair Module
 *
 * Version 1.0.0
 */

(function () {

    "use strict";

    const module = {

        selectors:[

        ".custom-logo",

        ".custom-logo-link img",

        ".site-logo img",

        ".logo img",

        ".navbar-brand img",

        ".header-logo img",

        ".brand img",

        "header .logo img",

        "header img[alt*='logo' i]",

        "header img[class*='logo' i]"

        ],

        repaired: 0,

        init() {

            RestanCompatibility.log(
                "Logo Repair Module Loaded"
            );

            this.scan();

            this.watchHeader();

        },

        scan() {

            const imageRepair =
                RestanCompatibility.modules.imageRepair;

            if (!imageRepair) {

                RestanCompatibility.log(
                    "Image Repair Module missing."
                );

                return;

            }

            this.selectors.forEach(selector => {

                RestanCompatibility.scan(

                    selector,

                    (img)=>{

                        if(

                            RestanCompatibility.helpers.isProcessed(

                                img,

                                "restanLogoChecked"

                            )

                        ){

                            imageRepair.repairImage(img);

                            RestanCompatibility.helpers.markProcessed(

                                img,

                                "restanLogoChecked"

                            );

                            this.repaired++;

                        }

                    }

                );

            });

            RestanCompatibility.log(

                "Logo scan complete",

                {

                    selectors:this.selectors.length,

                    repaired:this.repaired

                }

            );

        },

        watchHeader(){

            RestanCompatibility.observe(()=>{

                this.scan();

            });

            RestanCompatibility.log(

                "Logo observer registered."

            );

        }

    };

    RestanCompatibility.modules.logoRepair =
        module;

})();