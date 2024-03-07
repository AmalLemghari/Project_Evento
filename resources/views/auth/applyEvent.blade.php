<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply for the event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Main modal -->
    <div class="flex items-center justify-center min-h-screen space-x-8">

            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow bg-blue-50">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                        <h1 class="text-2xl font-semibold">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-orange-600">
                                Apply For The Event
                            </span>
                        </h1> 
                    </div>
                    <form class="p-4 md:p-5" action="{{route('applyEvent')}}" method="post">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="hidden" name="utilisateur_id" value="{{$user_id}}" required>
                            <input type="hidden" name="offre_emploi_id" value="{{$event_id}}" required>
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Message</label>
                                <textarea name="message" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required></textarea>
                            </div>
                        </div>
                        <button type="submit" name="addCursusEducatifs" class="block mx-auto w-full focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-gray-300 hover:bg-orange-600 focus:ring-orange-600 hover:text-white">
                            Add
                        </button>     
                    </form>
                </div>
            </div>
    </div>    
</body>
</html>