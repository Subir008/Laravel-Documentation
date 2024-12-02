<x-layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="heading">
        <h1>Layout</h1> 
     </x-slot>

    <x-slot name="main">
        <p>
            To use layout create a file name layout and kept the common code there, these will help to shorten the code and don't need to keep the same code repeat.
            <br>
            For using this layout in the required pages-
            <ul>
                <li>First, call the  &lt;x-layout &gt;  &lt;/ x-layout &gt; function</li>
                <li>Next, for each section create one slot and give the slot a name using the slot name the value will be show in the layout. <br>
                    &lt;x-slot name&equals;&quot;slot-name&quot; &gt;  CODES &lt;/x-slot&gt;
                </li>
            </ul>
        </p>
        <p>
            <h3>Example</h3>
                &lt;x-layout &gt;  <br>
                &lt;x-slot name&equals;&quot;title&quot; &gt;  Home page &lt;/x-slot&gt; <br>
                &lt;/ x-layout &gt;
        </p>
        <p>Next <a href="/layout/inheritence">Layout with Inheritence</a></p>
    </x-slot>
</x-layout>