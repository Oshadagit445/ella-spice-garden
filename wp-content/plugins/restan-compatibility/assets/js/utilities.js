(function(window){

    if(window.RestanCompatibility === undefined){
        window.RestanCompatibility = {
            helpers: {

                repairUrl(url) {

                    if (!url) {
                        return url;
                    }

                    try {

                        const parsed = new URL(
                            url,
                            window.location.origin
                        );

                        if (
                            parsed.hostname === "localhost"
                        ) {

                            parsed.protocol = location.protocol;

                            parsed.host = location.host;

                            parsed.pathname =
                                parsed.pathname.replace(
                                    /^\/site2/,
                                    ""
                                );

                        }

                        return parsed.toString();

                    }
                    catch (e) {

                        return url;

                    }

                }

            }
        };
    }

    const RC = window.RestanCompatibility;

    RC.modules = RC.modules || {};

    RC.version = "1.0.1";

    RC.debug = true;

    RC.modules = RC.modules || {};

    RC.helpers = RC.helpers || {};

    RC.state = RC.state || {};

    RC.config = RC.config || {};

    RC.log = function(){

        if(!RC.debug){
            return;
        }

        console.log(
            "[Restan Compatibility]",
            ...arguments
        );

    };

    RC.isLocalhost = function(url){

        if(!url){
            return false;
        }

        return url.includes("localhost")
            || url.includes("127.0.0.1");

    };

    RC.observe = function(callback){

        const observer = new MutationObserver(callback);

        observer.observe(document.body,{
            childList:true,
            subtree:true
        });

        return observer;

    };

    RC.scan = function(selector,callback){

        document.querySelectorAll(selector).forEach(callback);

    };

    RC.helpers.markProcessed = function(element,key){

        if(!element || !key){
            return;
        }

        element.dataset[key] = "1";

    };

    RC.helpers.isProcessed = function(element,key){

        if(!element || !key){
            return false;
        }

        return element.dataset[key] === "1";

    };

})(window);