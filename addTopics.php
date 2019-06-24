<?php
/**
 * Created by PhpStorm.
 * User: coole
 * Date: 10-4-2019
 * Time: 10:16
 */

include_once 'basic.php';

$page = $_GET['thread'];

$epage = explode("/", $page);

$realpage = $epage[1];

if($realpage == 'html5.php') {
    $realpage = 'HTML';
} elseif($realpage == 'bootstrap.php') {
    $realpage = 'BOOTSTRAP';

} elseif($realpage == 'css3.php') {
    $realpage = 'CSS';

} elseif($realpage == 'php.php') {
    $realpage = 'PHP';

} elseif($realpage == 'sql.php') {
    $realpage = 'SQL';

} elseif($realpage == 'javascript.php') {
    $realpage = 'JAVASCRIPT';

} else {
   echo 'Geen toegang ga terug en wees eens braaf';
   die();
}

?>


    <html>
            <head>

            </head>
    <body>
        <div class="col-sm-8 center bg-dark text-white rounded m-5 p-2">

            <h3 class="text-center font-weight-light w-100">Make an topic</h3>
            <form method="post" action="addtopic.php">
            title:
            <br>
            <input class="w-100 rounded" name="topic_title" type="text" required>
            <input class="w-100 rounded" name="page" type="hidden" value="<?= $realpage ?>">

            <br>

            description:
            <br>
            <textarea class=" rounded noresize w-100" rows="10"   name="topic_beschrijving" id="" required></textarea><br><br>
                <button type="submit" class="btn btn-light text-dark w-100">Add Topic</button>

                <input type="hidden" name="htags" id="tags" required>

            </form>
            <div>
                <ul class="box nav " id="tagList">

                </ul>
            </div>
            <div class="row center col-sm-12">
                <h4>Add tags to make ur topic easier to find</h4>
            <input class="input col-sm-8 center" id="new_tag" type="text" required><div class="col-sm-4  text-white center"><button id="addtag" class="btn mt-1 mb-1 text-white col-sm-12  container bg-vueg center">Add tagg</button></div>
            </div>
            </div>
    </body>

            <script>
                let addTagButton = document.querySelector('#addtag');
                let inputInForm = document.querySelector('#tags');
                let tagList = document.querySelector('#taglist');
                let newTagInput = document.querySelector('#new_tag');
                let tags = [];

                addTagButton.addEventListener('click', addTag);
                newTagInput.addEventListener('keyup', addTag);

                window.onload = function() {
                    inputInForm.value = '';
                    tagList.innerHTML = '';
                    let teller = 1;
                    let max_teller = tags.length;
                    tags.forEach((tag) => {
                        inputInForm.value += tag + (teller === max_teller ? '' : ',');
                        tagList.innerHTML += `<li class="taggs tag">&nbsp;${tag}<span class="text-20 h-50 text-danger   rounded del" onclick="delTag('${tag}')">&nbsp;x</span></li>`
                        teller++;
                    });
                };


                function handleNewTagInput()
                {
                    if (newTagInput.value == "") {
                        newTagInput.placeholder = "Vul iets in!";
                    } else {
                        newTagInput.placeholder = "";

                        let new_tag = newTagInput.value;
                        let tag_string = (inputInForm.value == '' ? new_tag : inputInForm.value + ',' + new_tag);
                        inputInForm.value = tag_string;
                        tags.push(new_tag);
                        tagList.innerHTML += `<li class="taggs tag">&nbsp;${new_tag}<span class="text-20 h-50 text-danger  rounded del" onclick="delTag('${new_tag}')">&nbsp;x</span></div>`;
                        newTagInput.value = '';
                        newTagInput.focus();
                    }
                }

                function addTag(event)
                {
                    console.log(event);
                    switch(event.target.tagName) {
                        case 'INPUT':                 // Input tag met onkeyup
                            if(event.key === 'Enter') {
                                handleNewTagInput();
                            }
                            break;

                        case 'BUTTON':                 // Button tag met onclick
                            handleNewTagInput();
                            break;
                    }

                }

                function delTag(text)
                {
                    // Hij moet verwijdert worden uit de array
                    // Op basis van de nieuwe array gaan we:
                    let index = tags.findIndex( (tag) => tag === text );
                    console.log(tags, index, text);
                    if(index > -1) {
                        tags.splice(index, 1);

                        // A) inputInForm opnieuw vullen
                        inputInForm.value = '';
                        tagList.innerHTML = '';
                        let teller = 1;
                        let max_teller = tags.length;
                        tags.forEach((tag) => {
                            inputInForm.value += tag + (teller === max_teller ? '' : ',');
                            tagList.innerHTML += `<li class="taggs tag">&nbsp;${tag}<span class="text-20 h-50 text-danger  rounded del" onclick="delTag('${tag}')">&nbsp;x</span></li>`
                            teller++;
                        });
                    }

                    // B) tag_list opnieuw vullen
                }



            </script>

    </html>


<?php

include_once 'footer.php';

?>
