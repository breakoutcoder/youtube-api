<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube</title>
    <?php include './css/css.php' ?>
</head>

<body>
    <section class="mt-2">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <form id="search">
                        <input type="text" name="search" class="form-control search" value="Gopal Bhar" placeholder="Search">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body" id="em">
                    please wait...
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    $url .= $_SERVER['HTTP_HOST'];
    ?>

    <?php include './js/js.php' ?>
    <script>
        $(document).ready(function() {
            let searchValue = document.querySelector('.search');
            video(searchValue.value);
            $('form').on('submit', function(e) {
                e.preventDefault();
                video(searchValue.value);
            });
        });

        function video($search = 'gopal bhar') {
            let values = {
                'search': $search
            };
            let em = document.querySelector('#em');
            $.ajax({
                url: "<?php echo $url . '/search/YoutubeSearch.php' ?>",
                type: "post",
                data: values,
                success: function(res) {
                    em.innerHTML = 'please wait...';
                    var response = JSON.parse(res);
                    if (response.length != 0) {
                        em.innerHTML = '';
                        for (i in response) {
                            em.insertAdjacentHTML('beforeend', '<iframe class="p-2" width="560" height="315" src="https://www.youtube.com/embed/' + response[i] + '" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>');
                        }
                    } else {
                        em.innerHTML = '<h1 class="text-danger">Sorry Video Not Found. Please Search Again</h1>';
                    }
                }
            });
        }
    </script>

</body>

</html>