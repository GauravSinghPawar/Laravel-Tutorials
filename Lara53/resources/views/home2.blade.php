@extends('layouts.app')



@section('title','Home2')


@section('body')


  @foreach($processors as $processor)
      {{$processor}}<br>
  @endforeach


  @if($num1>$num2)
  Num1 is Greater than Num2 whose value is {{$num1}}
  @else
  Num2 value exceeds Num1 value whose value is {{$num2}}
  @endif
<br>
  @unless($num1>$num2)
  Num2 is Greater than Num1 whose value is {{$num2}}
  @else
  Num1 is Greater than Num2 whose value is {{$num1}}
  @endunless



<br>
<hr>
  @while($num2<50)
  {{$num2++}}
  @endwhile


<br>

  @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}<br>
  @endfor

@endsection



@section('content')

This is another content inside another section

@endsection



@section('body2')

Its a completly different section from the rest of all.

@endsection
