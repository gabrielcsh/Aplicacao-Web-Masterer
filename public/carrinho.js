function carrinhoRemoverProduto( idpedido, idproduto, item ) {
    $('#form-remover-produto input[name="order_id"]').val(idpedido);
    $('#form-remover-produto input[name="product_id"]').val(idproduto);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}

function carrinhoAdicionarProduto( idproduto ) {
    $('#form-adicionar-produto input[name="id"]').val(idproduto);
    $('#form-adicionar-produto').submit();
}