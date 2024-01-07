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

/**
 *
 * @param defaultUrl
 * @param categoryId
 * @param page
 * @param countLimit
 * @returns {string}
 */
export function getUrlProductsByCategory(defaultUrl, categoryId, page, countLimit) {
    return (
        defaultUrl
        + "?category=/api/categories/"
        + categoryId
        + "&isPublished=true"
        + "&page="
        + page
        + "&itemsPerPage="
        + countLimit
    );
}