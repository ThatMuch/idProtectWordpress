import Edit from "./edit";
import Save from "./save";
import { __ } from "@wordpress/i18n";
import { mediaAndText as icon } from "@wordpress/icons";
import metadata from "./block.json";
import { registerBlockType } from "@wordpress/blocks";

registerBlockType(metadata.name, {
    title: metadata.title,
    icon,
    category: "layout",
    supports: {
        splitting: true,
        // typography: {
        //     fontSize: true,
        //     lineHeight: true,
        //     __experimentalFontFamily: true,
        //     __experimentalTextDecoration: true,
        //     __experimentalFontStyle: true,
        //     __experimentalFontWeight: true,
        //     __experimentalLetterSpacing: true,
        //     __experimentalTextTransform: true,
        //     __experimentalWritingMode: true,
        //     __experimentalDefaultControls: {
        //         fontSize: true,
        //     },
        // },
        color: {
            gradients: true,
            link: true,
            __experimentalDefaultControls: {
                background: true,
                text: true,
            },
        },
        highlight: true,
    },
    attributes: {
        title: {
            type: "rich-text",
            source: "rich-text",
            selector: "h1,h2,h3,h4,h5,h6",
        },
    },
    edit:Edit,
    save: Save,
});
