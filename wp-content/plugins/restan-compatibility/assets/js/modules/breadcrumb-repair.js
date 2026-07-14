(function(){

    const RC = window.RestanCompatibility;

    if(!RC){
        return;
    }

    RC.log("Breadcrumb Module Loaded");

    const selectors=[

    ".breadcrumb",

    ".breadcrumbs",

    ".breadcrumb-area",

    ".woocommerce-breadcrumb",

    ".rank-math-breadcrumb"

    ];

    selectors.forEach(function(selector){

        RC.scan(selector,function(container){

            repair(container);

        });

    });

    RC.observe(function(){

        selectors.forEach(function(selector){

            RC.scan(selector,function(container){

                repair(container);

            });

        });

    });

    function repair(container){

        RC.log(

            "Breadcrumb before repair",

            {

                style:
                    container.getAttribute("style"),

                dataBackground:
                    container.getAttribute(
                        "data-background"
                    )

            }

        );

        if(container.dataset.rcDone){
            return;
        }

        container.dataset.rcDone = "1";

        repairInlineStyle(container);

        repairBackgroundAttribute(container);

        repairChildImages(container);

    }

    function repairInlineStyle(container){

        const style =
            container.getAttribute("style");

        if(!style){
            return;
        }

        const repairedStyle =
            style.replace(
                /https?:\/\/localhost\/site2/g,
                window.location.origin
            );

        if(repairedStyle !== style){

            container.setAttribute(
                "style",
                repairedStyle
            );

            RC.log(
                "Breadcrumb inline style repaired",
                repairedStyle
            );

        }

    }

    function repairBackgroundAttribute(container){

        const background =
            container.getAttribute(
                "data-background"
            );

        if(!background){
            return;
        }

        const repaired =
            RC.helpers.repairUrl(background);

        container.setAttribute(
            "data-background",
            repaired
        );

        container.style.backgroundImage =
            "url('" + repaired + "')";

        RC.log(
            "Breadcrumb data-background repaired",
            repaired
        );

    }

    function repairChildImages(container){

        const imageRepair =
            RC.modules.imageRepair;

        if(!imageRepair){
            return;
        }

        container
            .querySelectorAll("img")
            .forEach(function(img){

                imageRepair.repairImage(img);

            });

    }
});