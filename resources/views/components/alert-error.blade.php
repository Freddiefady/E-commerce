<!-- @if ($errors->has('error'))
    <div class="row mt-1">
        <button type="button" class="btn btn-lg btn-block btn-outline-danger mb-2"
            id="type-error">{{$errors->first('error')}}</button>
    </div>
@endif -->
<div class="swal-modal" id="delete-roles_{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="swal-icon swal-icon--error">
        <div class="swal-icon--error__x-mark">
            <span class="swal-icon--error__line swal-icon--error__line--left"></span>
            <span class="swal-icon--error__line swal-icon--error__line--right"></span>
        </div>
    </div>
    <div class="swal-title">Error!</div>
    <div class="swal-text">You clicked the button!</div>
    <div class="swal-footer">
        <div class="swal-button-container">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            <button class="swal-button swal-button--confirm">OK</button>

            <div class="swal-button__loader">
                <div></div>
                <div></div>
                <div></div>
            </div>

        </div>
    </div>
</div>
