<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
    <div class="register-container">

        <form action="" method="post" id="first">
            <fieldset>
                <legend>
                    REGISTER
                </legend>

                <h1>User Data</h1>
                
                <div class="form-row">
                    <input type="text" name="login" id="" placeholder="LOGIN">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </div>

                <div class="form-row" >
                    <input type="password" name="password" id="" placeholder="PASSWORD">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>

                <div class="form-row">
                    <input type="email" name="email" id="email" style="color: whitesmoke" placeholder="EMAIL">
                    <label for="email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-envelope-at" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                          </svg>
                    </label>
                </div>

                <button type="button" id="next" class="btn btn-secondary"> NEXT </button>

            </fieldset>

        </form>

        <form action="" method="post" id="second">
            <fieldset>
                <legend>
                    REGISTER
                </legend>
                <h1>Personal Data</h1>
                <div class="form-row">
                    <input type="text" name="imie" id="" placeholder="FIRST NAME">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </div>

                <div class="form-row">
                    <input type="text" name="nazwisko" id="" placeholder="LAST NAME">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                    </svg>
                </div>

                <div class="form-row">
                    <input type="date" name="date" id="date" style="color: whitesmoke; width: 100%; height: 100%;" placeholder="BIRTHDAY">
                    <!-- <label for="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="whitesmoke" class="bi bi-calendar" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                    </label> -->
                </div>

                <button type="button" id="back" class="btn btn-secondary">Back</button>
                <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 50px;"> Register </button>

            </fieldset>

        </form>
    </div>

    <script>
        let next = document.querySelector("#next");
        let back = document.querySelector("#back");
        let second = document.querySelector("#second");
        let first = document.querySelector("#first");

        next.addEventListener("click", () => {
            first.style.left = "-600px";
            second.style.left = "0px";

        })

        back.addEventListener("click", () => {
            first.style.left = "0";
            second.style.left = "600px";

        })
        
    </script>

    <?php



    ?>

</body>
</html>