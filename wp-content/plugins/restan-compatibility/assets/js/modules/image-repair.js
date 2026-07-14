/**
 * Image Repair Module
 *
 * Repairs localhost image URLs.
 *
 * Version: 1.0.0
 */

(function () {

    "use strict";

    const module = {

        repaired: 0,

        skipped: 0,

        scanned: 0,

        init() {

            RestanCompatibility.log("Image Repair Module Loaded");

            this.scanImages();

            this.watchForChanges();

        },

        scanImages(root = document) {

            RestanCompatibility.scan(

                "img",

                (image) => {

                    if (root !== document && !root.contains(image)) {
                        return;
                    }

                    this.scanned++;

                    this.repairImage(image);

                }

            );

            RestanCompatibility.log(

                "Image scan complete.",

                {

                    scanned: this.scanned,

                    repaired: this.repaired,

                    skipped: this.skipped

                }

            );

        },

        repairImage(image) {

            if (!image) {
                return;
            }

            if (
                RestanCompatibility.helpers.isProcessed(
                    image,
                    "restanFixed"
                )
            ) {
                this.skipped++;
                return;
            }

            let repaired = false;

            [
                "src",
                "srcset",
                "data-src",
                "data-srcset",
                "data-lazy-src",
                "data-lazy-srcset",
                "data-original"
            ].forEach(attribute => {

                if (this.repairAttribute(image, attribute)) {
                    repaired = true;
                }

            });

            RestanCompatibility.helpers.markProcessed(
                image,
                "restanFixed"
            );

            if (repaired) {

                this.repaired++;

                RestanCompatibility.log(
                    "Image repaired",
                    image
                );

            }
            else {

                this.skipped++;

            }

        },

        repairAttribute(image, attributeName) {

            const value = image.getAttribute(attributeName);

            if (!value) {
                return false;
            }

            let repaired = value;

            if (
                attributeName === "srcset" ||
                attributeName === "data-srcset"
            ) {

                repaired = value
                    .split(",")
                    .map(entry => {

                        const parts = entry.trim().split(/\s+/);

                        parts[0] =
                            RestanCompatibility.helpers.repairUrl(
                                parts[0]
                            );

                        return parts.join(" ");

                    })
                    .join(", ");

            }
            else {

                repaired =
                    RestanCompatibility.helpers.repairUrl(
                        value
                    );

            }

            if (repaired !== value) {

                image.setAttribute(
                    attributeName,
                    repaired
                );

                RestanCompatibility.log(

                    "Repaired " + attributeName,

                    {

                        old: value,

                        new: repaired

                    }

                );

                return true;

            }

            return false;

        },

        watchForChanges() {

            RestanCompatibility.observe(() => {

                this.scanImages();

            });

            RestanCompatibility.log(

                "Image observer registered."

            );

        }

    };

    RestanCompatibility.modules.imageRepair = module;

})();