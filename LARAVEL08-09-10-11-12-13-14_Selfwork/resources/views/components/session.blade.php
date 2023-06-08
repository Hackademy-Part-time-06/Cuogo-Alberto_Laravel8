@if (session('success')) 
    <div id="sessionSuccess" class="justify-content-center" style="display: flex;">
        <div class="text-center w-50 bg-success bg-opacity-50 border border-2 border-success rounded text-light mb-4 px-5 py-3 fs-3 fw-bold">{{session('success')}}</div> 
    </div>
@elseif (session('edit'))
    <div id="sessionEdit" class="justify-content-center" style="display: flex;">
        <div class="text-center w-50 bg-warning bg-opacity-50 border border-2 border-warning rounded text-light mb-4 px-5 py-3 fs-3 fw-bold">{{session('edit')}}</div> 
    </div>
@elseif (session('delete'))
    <div id="sessionDelete" class="justify-content-center" style="display: flex;">
        <div class="text-center w-50 bg-danger bg-opacity-50 border border-2 border-danger rounded text-light mb-4 px-5 py-3 fs-3 fw-bold">{{session('delete')}}</div> 
    </div>
@endif