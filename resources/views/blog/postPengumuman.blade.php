<div class="mt-5 ml-5">
    @foreach($announcements as $key => $value)
    <form action="{{route('article',$value->id_article) }}" method="GET">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4 border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <button class="text-lg pt-2 text-blue-600/100" type="submit">{{$value->title}}</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $value->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </form>
    @endforeach
</div>