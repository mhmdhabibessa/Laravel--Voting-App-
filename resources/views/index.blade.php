<x-app-layout>
    
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-lg px-4 py-2 border-none">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-lg px-4 py-2 border-none">
                <option value="Filters One">Filters One</option>
                <option value="Filters Two">Filters Two</option>
                <option value="Filters Three">Filters Three</option>
                <option value="Filters Four">Filters Four</option>
            </select>
        </div>
       <div class="w-2/3 relative">
           
            <input type="search" placeholder="Find an Data" class="w-full border-none placeholder-gray-900 rounded-xl bg-white px-4 py-2 pl-8">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg  class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
            </div>
        </div>
    </div>
        <div class="ideas-container space-y-6 my-6 hover:shadow-lg transition duration-150 ease-in">
            <div class="ideas-container bg-white rounded-xl flex cursor-pointer">
                <div class="border-r border-gray-100 px-5 py-8">
                        <div class="text-center">
                                <div class="font-semibold text-2xl"> 12</div>
                                <div class="text-gray-500">Votes</div>
                        </div>
                        <div class="mt-8"> 
                            <button class="w-20 bg-gray-200 font-bold text-xs rounded-full uppercase transition duration-200 ease-in hover:border-blue py-3 px-4 border border-gray-200 hover:border-gray-800 ">
                                    vote
                            </button>
                        </div>
                </div>
                <div class="flex py-6 px-2">
                    <a href="#" class="flex-none">
                        <img src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="avatar" class="w-14 h-14 rounded-lg">
                    </a>
                    <div class="mx-4">
                        <h4 class="text-xl font-semibold">
                               <a href="#" class="hover:underline">A Random Title can place hear </a> 
                        </h4>
                        <div class="text gray-400 line-clamp-3">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta rem velit, sit beatae veritatis sapiente earum ipsum, quod aliquam totam praesentium maiores eaque in aut similique eum nobis mollitia molestias natus eligendi aliquid, a eius? Quaerat consequuntur iusto quos explicabo iste, architecto ipsam reiciendis in unde perferendis. Ipsum, fugiat iste. Provident numquam voluptas earum iusto quis ut asperiores, ullam exercitationem nam illum voluptatum voluptatem accusamus aspernatur eos. Facere, rerum recusandae. Repellendus possimus illo natus et nostrum! Deserunt ratione ipsa in nam vero quae cumque, praesentium obcaecati minus dolor pariatur repellendus culpa quod veritatis doloribus accusantium debitis quaerat fuga? Sunt, animi.
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <div class="flex text-gray-400 items-center text-xs font-semibold space-x-2">
                                    <div> 10 houres ago</div>
                                    <div>&bull;</div>
                                    <div>Category</div>
                                    <div class="text-gray-900">4 Comments</div>    
                            </div>
                                <div class="flex items-center space-x-4">
                                    <div class="bg-gray-200 rounded-full px-2 py-2 text-center w-28 h-7 uppercase text-xs font-bold leading-none"> Open</div>
                                    <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 px-3 transition duration-150 ease-in"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                          </svg>
                                        <ul class="ml-5 absolute w-44 font-semibold bg-white shadow-lg rounded-lg py-3">
                                            <li>
                                                <a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"> Mark as Spam</a>
                                            </li>
                                            <li>
                                                <a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"> Delet Post </a>
                                            </li>    
                                        </ul>
                                    </button>
                                    
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
