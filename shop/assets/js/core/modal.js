const btnCadastrar = document.getElementById("cadastrarVendedor");
if (btnCadastrar) {
    btnCadastrar.addEventListener("click", function() {
        Swal.fire({
            title: 'Você deseja realmente cadastrar esse vendedor?',
            text: "Essa ação não poderá ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#157347',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, cadastrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('formVendedor');
                const formData = new FormData(form);

                fetch(form.action, { method: 'POST', body: formData })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            Swal.fire({
                                title: 'Vendedor cadastrado',
                                html: `
                                    <div style="
                                        display: flex;
                                        flex-direction: column;
                                        align-items: center;
                                        justify-content: center;
                                        padding: 25px;
                                        border-radius: 16px;
                                        background: linear-gradient(135deg, #ffffff, #f8f9fa);
                                        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
                                        max-width: 360px;
                                        margin: 0 auto;
                                        animation: fadeIn 0.6s ease-in-out;
                                    ">
                                        <div style="
                                            width: 120px; 
                                            height: 120px; 
                                            border-radius: 50%; 
                                            overflow: hidden; 
                                            border: 4px solid #157347;
                                            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                                            margin-bottom: 18px;
                                            animation: zoomIn 0.5s ease;
                                        ">
                                            <img src="${data.foto}" 
                                                alt="Foto do vendedor" 
                                                style="width:100%; height:100%; object-fit: cover;">
                                        </div>
                                        <h2 style="
                                            margin: 0; 
                                            font-size: 22px; 
                                            font-weight: 700; 
                                            color: #157347;
                                            text-align: center;
                                        ">${data.nome}</h2>
                                        <div style="
                                            margin-top: 15px; 
                                            width: 100%; 
                                            font-size: 15px;
                                            color: #444;
                                            line-height: 1.6;
                                        ">
                                            <p style="margin: 6px 0;">
                                                <strong>Email:</strong> ${data.email}
                                            </p>
                                            <p style="margin: 6px 0;">
                                                <strong>Telefone:</strong> ${data.telefone}
                                            </p>
                                        </div>
                                    </div>
                                `,
                                icon: 'success',
                                confirmButtonColor: '#198754'
                            });
                            form.reset();
                        }
                    });
            }
        });
    });
}

const btnFinalizar = document.getElementById("finalizarVenda");
if (btnFinalizar) {
    btnFinalizar.addEventListener("click", function(e) {
        e.preventDefault(); // impede envio tradicional do form
        Swal.fire({
            title: 'Você está prestes a concluir esta venda, deseja prosseguir?',
            text: "Essa ação não poderá ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#157347',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, concluir venda',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const formVenda = document.getElementById('formFinalizarVenda');
                const formVendaData = new FormData(formVenda);

                fetch(formVenda.action, {
                    method: 'POST',
                    body: formVendaData
                })
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Vendido!',
                        text: 'A venda foi concluída com sucesso.',
                        icon: 'success',
                        confirmButtonColor: '#198754'
                    });
                    formVenda.reset();

                    const carrinhoLista = document.getElementById('carrinhoLista');
                    if (carrinhoLista) carrinhoLista.innerHTML = '';

                    const totalVenda = document.getElementById('totalVenda');
                    if (totalVenda) totalVenda.innerText = 'R$ 0,00';
                })
                .catch(err => {
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Ocorreu um erro ao finalizar a venda.',
                        icon: 'error',
                        confirmButtonColor: '#dc3545'
                    });
                    console.error(err);
                });
            }
        });
    });
}
