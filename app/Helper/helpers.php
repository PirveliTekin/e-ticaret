<?php
if (!function_exists('deleteConfirm')) {

    function deleteConfirm($title,$text,$link){
       echo '  <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">'.$title.'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">'.$text.'</div>
                        <div class="modal-footer">
                            <a href="#" type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Hayır</a>
                            <a href="'.$link.'"type="button" class="btn btn-primary btn-pill">Evet</a>
                        </div>
                    </div>
                </div>
            </div>';
    }

}
