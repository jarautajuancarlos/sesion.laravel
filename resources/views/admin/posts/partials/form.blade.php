<div class="form-group">
  {!! Form::label('name', 'Nombre') !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

  @error('name')
    <small class="text-danger">
      {{$message}}
    </small>
  @enderror

</div>

<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}

  @error('slug')
    <small class="text-danger">
      {{$message}}
    </small>
  @enderror

</div>

<div class="form-group">
  {!! Form::label('category_id', 'Categoría') !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  @error('category_id')
    <small class="text-danger">
      {{$message}}
    </small>
  @enderror

</div>

<div class="form-group">
  <p class="font-weight-bold">Etiquetas</p>
  @foreach($taqs as $taq)

    <label class="mr-2">
      {!! Form::checkbox('taqs[]', $taq->id, null) !!}
      {{$taq->name}}
    </label>
  @endforeach


  @error('taqs')
  <br>
    <small class="text-danger">
      {{$message}}
    </small>
  @enderror
</div>

<div class="form-group">
  <p class="font-weight-bold">Estado</p>
  <label class="mr-2">
    {!! Form::radio('status', 1, true) !!}
    Borrador
  </label>
  <label>
    {!! Form::radio('status', 2) !!}
    Publicado
  </label>


  @error('status')
  <br>
    <small class="text-danger">
      {{$message}}
    </small>
  @enderror

</div>

<div class="row mb-3">
  <div class="col">
    <div class="image-wrapper">
      @isset ($post->image)
        <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
      @else
        <img id="picture" src="https://cdn.pixabay.com/photo/2014/07/07/13/42/watercolor-386189_960_720.jpg" alt="">
      @endisset
    </div>
  </div>
  <div class="col">
    <div class="form-group">

      {!! Form::label('file', 'Imagen que se mostrará en el post') !!}
      <!-- AÑADIMOS ATRIBUTOS PARA SUBIR SOLO IMAGENES -->
      {!! Form::file('file', ['class' => 'form-control-file',
       'accept' => 'image/*']) !!}

       @error('file')
         <span class="text-danger">
           {{$message}}
         </span>
       @enderror
    </div>

    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

  </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
      <small class="text-danger">
        {{$message}}
      </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
      <small class="text-danger">
        {{$message}}
      </small>
    @enderror

</div>
