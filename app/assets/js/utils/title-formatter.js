/**
 * |
 * @param product
 * @returns {string}
 */
export function getProductInformativeTitle(product) {
    return (
        '#'
        + product.id
        + ' '
        + product.title
        + ' / P: $'
        + product.price
        + ' / Q: '
        + product.quantity
    );
}