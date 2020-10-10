<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Strix\Http\Controllers\Forums\Board;

use Illuminate\Http\Request;
use Strix\Http\Controllers\Controller;
use Strix\Models\Board\Board;

class BoardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Board $board)
    {
        return view('pages.forum.board.show', [
            'board' => $board,
        ]);
    }
}
