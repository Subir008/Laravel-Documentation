@extends('components/layout-inheritence')

@section('heading' , 'Layout with Inheritence')

@section('main')
<div>
    <p>
        To use the layout with inheritence --
        <ul>
            <li>
                First, extends the page of the layout using - <br> 
                <strong> &commat;extends(' pass the path of the layout')</strong>.
             </li>
             <br>
            <li>For writing small contents or heading use - 
                <br> <strong> &commat;section('section_name' ,'content') </strong>
            </li>
            <br>
            <li>For writing huge contents use - <br> 
                <strong> 
                    &commat;section('section_name')<br>
                        CONTENTS <br>
                    &commat;endsection
                </strong>
            </li>
            <br>
            <li>
                Last, use this section name in the layout within -- <br>
                <strong>
                    &commat;yield('section_name') -> For small contents or heading <br><br>
                    &commat;section('section_name') <br>
                    &commat;show    -> For large contents
                </strong>
            </li>
        </ul>
    </p>
</div>

<div>
    <h4>Example</h4>
    &commat;extends('components/layout-inheritence') <br>

    &commat;section(section: 'heading' , content: 'Layout with Inheritence') <br><br>

    &commat;section(section:'main') <br>
    ALL CONTENTS <br>
    &commat;endsection
</div>

@endsection