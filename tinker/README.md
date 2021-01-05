## Tinker Commands

```console
php artisan tinker
```

you should see a tinker shell in the command prompt and all basic tinker commands can be written there to test different database queries and other stuffs instead of coding inside the application

**to create mode instances**

```console
$post = new  App\Models\Post()
```

**to insert data into post table**

```console
$post->title = 'new title'
$post->content = 'new content'
$post->save()
```

**to retrieve and update data**

```console
$post->where('user_id', 1)->get()->first()
$post->title = 'updated title'
$post->save()
```

**to get data using relationships**

```console
$user = $post->where('user_id', 1)->get()->first()
$user->user
```

**to soft and force delete**

```console
$user = $post->where('user_id', 1)->get()->first()->user
$user->delete(); [soft deletes]
$user->withTrashed()->forceDelete() [deletes permanently]
```
