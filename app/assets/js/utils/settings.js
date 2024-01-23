/**
 * @type {{headers: {accept: string, "Content-Type": string}}}
 */
export const apiConfig = {
    headers: {
        accept: 'application/ld+json',
        'Content-Type': 'application/json'
    }
};
/**
 * @type {{headers: {accept: string, "Content-Type": string}}}
 */
export const apiConfigPatch = {
    headers: {
        accept: "application/ld+json",
        "Content-Type": "application/merge-patch+json"
    }
};