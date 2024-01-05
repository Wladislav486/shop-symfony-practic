/**
 *
 * @param viewUrl
 * @param productId
 * @returns {string}
 */
export function getUrlViewProduct(viewUrl, productId) {
    return (
        window.location.protocol +
        '//' +
        window.location.host +
        viewUrl +
        '/' +
        productId
    );
}

/**
 * @param params
 * @returns {string}
 */
export function concatUrlByParams(...params) {
    return params.join('/');
}