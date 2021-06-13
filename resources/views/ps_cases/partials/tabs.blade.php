{{-- tabs buttons--}}
<ul class="nav nav-pills" id="pills-tab" role="tablist">
    <?php $n = 0; ?>
    @foreach ($tabs as $tab)
    <?php $n++; ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link{{ $n == '1' ? ' active' : '' }}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#{{ $tab['name'] }}" type="button" role="tab" aria-controls="{{ $tab['name'] }}" aria-selected="{{ $tab['name'] == 'New' ? 'true' : 'false' }}">{{ $tab['name'] }}</button>
        </li>
    @endforeach
</ul>
{{-- end tabs buttons--}}

{{-- tab contents --}}
<div class="tab-content" id="pills-tabContent">
    <?php $n = 0; ?>
    @foreach ($tabs as $tab)
        <?php $n++; ?>
        <div class="tab-pane fade{{ $n == '1' ? ' show active' : '' }}" id="{{ $tab['name'] }}" role="tabpanel" aria-labelledby="{{ $tab['name'] }}-tab">
            <br>
            
            <!-- table -->
            @include('ps_cases.partials.table')
            <!-- end table -->
                    

        </div>
    @endforeach
</div>
<!-- tab contents -->