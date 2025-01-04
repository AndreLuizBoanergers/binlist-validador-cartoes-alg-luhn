<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xxxBinxxx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles.css">
  </head>
  <body>



    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">xxxBin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled text-light" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container mt-5">
        <section class="">
            <h2>Verificador de Número de Indentificação Bancaria ("BIN")</h2>
              
            <div class="card-container d-flex w-100">
                <div class="w-50">
                    <div class="mt-5">
                        <div class="px-5">
                            <div class=" m-3">

                              <input type="number" class="" placeholder="457173" aria-label="457173" aria-describedby="button-addon2" style="border:none; border-bottom: 2px solid #cecece;" id="bin" max="6">
                              <button class="btn btn-primary" type="button" id="btn-bin">Pesquisar</button>
                              <p style="font-size:0.5rem; color: red;">*somente 6 digitos</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 id="card-type">MASTERCARD</h2>
                                <img id="card-logo" src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Card Logo">
                            </div>
                            <div class="card-number" id="card-number">517805 **** **** ****</div>
                            <div class="card-details">
                                <p>Type: <span id="card-category">CREDIT</span></p>
                                <p>Category: <span id="card-tier">WORLD</span></p>
                                <p>Bank: <span id="card-bank">CAPITAL ONE, NATIONAL ASSOCIATION</span></p>
                                <p>Country: <span id="card-country">UNITED STATES (USA)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-50 mt-5">
                    <h3>Validador numero Cartoes</h3>
                    <p class="mt-3">Antes de qualquer transação com cartao de credito a ser processada , o numero do cartao pode ser validado, para confirmar se a seguencia e  valida. Esta etapa ajuda a a detectar erros de digitacao ou número incompletos fazendo que o processamento seja completado cooretamente</p>
                    <div class=" m-3">
                        <input type="number" class="" placeholder="457173609090901" aria-label="45717360" aria-describedby="button-addon2" style="border:none; border-bottom: 2px solid #cecece;" id="lun" max="6">
                        <button class="btn btn-primary" type="button" id="btn-lun">Validar</button>
                    </div>
                    <div class="valid" id="valid"></div>
                </div>
            </div>
            
        </section>
    </main>




    <script>

        function valid_credit_card(value) {
            if(value.length < 15) return false;
          // Accept only digits, dashes or spaces
            if (/[^0-9-\s]+/.test(value)) return false;

            // The Luhn Algorithm. It's so pretty.
            let nCheck = 0, bEven = false;
            value = value.replace(/\D/g, "");

            for (var n = value.length - 1; n >= 0; n--) {
                var cDigit = value.charAt(n),
                      nDigit = parseInt(cDigit, 10);

                if (bEven && (nDigit *= 2) > 9) nDigit -= 9;

                nCheck += nDigit;
                bEven = !bEven;
            }

            return (nCheck % 10) == 0;
        }
        let btnLuhn =  document.getElementById('btn-lun')
        btnLuhn.addEventListener('click', ()=>{

            const numLuhm = document.getElementById('lun').value;
            let result = document.querySelector('#valid');
            result.classList.remove('text-success', 'text-danger');
            let is_valid = valid_credit_card(numLuhm);
            
            if(is_valid){
                console.log(is_valid)
                result.classList.add('text-success')
                result.innerText = "Verdadeiro";
                console.log("Valido")
            }else{
                console.log(is_valid)
                result.classList.add('text-danger')
                result.innerText = "Falso";
                
                console.log("falso")
            }

        })
        const logos = {
            MASTERCARD: 'https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png',
            VISA: 'https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg',
            AMEX: 'https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo_%282018%29.svg',
            DISCOVER: 'https://upload.wikimedia.org/wikipedia/commons/9/95/Discover_Card_logo.svg',
            MAESTRO: 'https://upload.wikimedia.org/wikipedia/commons/2/24/Maestro_logo.svg',
            DINERS: 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Diners_Club_Logo.svg',
            JCB: 'https://upload.wikimedia.org/wikipedia/commons/3/31/JCB_logo.svg',
            UNIONPAY: 'https://upload.wikimedia.org/wikipedia/commons/d/d8/UnionPay_logo.svg'
        };


       const binlist =  function binlist(){
            const bin = document.getElementById('bin').value;
            fetch(`api.php?number=${bin}`)
            .then(response => response.json())
            .then(data => {
                console.log(data.data);
                let cardData = data.data[0]
                document.getElementById('card-type').innerText = cardData.card;
                document.getElementById('card-number').innerText = `${cardData.number} **** **** ****`;
                document.getElementById('card-category').innerText = cardData.type;
                document.getElementById('card-tier').innerText = cardData.category;
                document.getElementById('card-bank').innerText = cardData.bank;
                document.getElementById('card-country').innerText = `${cardData.country} (${cardData.code})`;
                const cardLogo = document.getElementById('card-logo');
                cardLogo.src = logos[cardData.card.toUpperCase()] || 'https://via.placeholder.com/50';
            });
        }
        const btnBin = document.getElementById('btn-bin');
        btnBin.addEventListener('click', binlist);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>