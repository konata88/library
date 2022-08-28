<html>
<head>
    <script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />

    <style>
        body {
            margin-top: 20px;
        }
        table img {
            max-height: 150px;
        }
        .deleteButton {
            margin-top: 10px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/functions.js"></script>
    <script src="/js/app.js"></script>
</head>
<body>
<div class="ui container">
    <h1 class="ui header">Library</h1>

    <div class="ui grid">
        <div class="four column row">
            <div class="left floated column">
                <button id="addBook" class="ui primary button">
                    Add book
                </button>
                <button id="showHistory" class="ui primary button">
                    History
                </button>
            </div>
            <div class="right floated column">
                <div class="ui search focus">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search books..." autocomplete="off" id="searchText">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui segment">
        <div class="ui active inverted dimmer" id="loader">
            <div class="ui text loader">Loading</div>
        </div>
        <table class="ui striped table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Year</th>
                <th>Description</th>
                <th>Type</th>
                <th>Take</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody  id="booksTable">
            </tbody>
        </table>
    </div>
</div>

<?php
require_once('modals/removeBookModal.htm.php');
require_once('modals/addBookModal.htm.php');
require_once('modals/editBookModal.htm.php');
require_once('modals/takeBookModal.htm.php');
require_once('modals/historyModal.htm.php');
?>


</body>
</html>