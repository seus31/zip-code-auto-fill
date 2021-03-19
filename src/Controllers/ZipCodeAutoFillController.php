<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */

namespace Seus31\ZipCodeAutoFill\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ZipCodeAutoFillController extends ZipCodeAutoFillBaseController
{
    /**
     * @var ZipCodeAutoFillLogic
     */
    private $zipCodeAutoFillLogic;

    /**
     * Create a new controller instance.
     *
     * @param ZipCodeAutoFillLogic $zipCodeAutoFillLogic
     */
    public function __construct(
        ZipCodeAutoFillLogic $zipCodeAutoFillLogic
    ) {
        $this->middleware('web');

        $this->zipCodeAutoFillLogic = $zipCodeAutoFillLogic;
    }

    /**
     * 予約フォームの表示
     *
     * @param Request $request
     * @param $storeId
     * @return Renderable
     */
    public function index(Request $request, $storeId): Renderable
    {
        return view('online-reserve::index')->with([
            'storeId' => $storeId,
            'store' => $this->onlineReserveFormLogic->getStore($storeId)
        ]);
    }

    /**
     * 予約内容をsessionに登録
     *
     * @param OnlineReserveFormRequest $request
     * @param $storeId
     * @return RedirectResponse
     */
    public function postForm(OnlineReserveFormRequest $request, $storeId): RedirectResponse
    {
        $this->onlineReserveFormLogic->postForm($request, $storeId);

        return redirect()->route('online.reserve.login');
    }

    /**
     * 予約フォームの表示
     *
     * @param Request $request
     * @return Renderable
     */
    public function inputAddress(Request $request): Renderable
    {
        return view('online-reserve::address')->with([
            'user' => $this->onlineReserveFormLogic->getUser()
        ]);
    }

    /**
     * 予約者情報の登録
     *
     * @param OnlineReserveAddressFormRequest $request
     * @return RedirectResponse
     */
    public function postAddress(OnlineReserveAddressFormRequest $request): RedirectResponse
    {
        $this->onlineReserveFormLogic->postAddress($request);

        return redirect()->route('online.reserve.confirm');
    }

    /**
     * 予約内容の確認
     *
     * @param Request $request
     * @return Renderable
     */
    public function reserveConfirm(Request $request): Renderable
    {
        return view('online-reserve::confirm')->with([
            'input' => $request->session()->get('reserve')
        ]);
    }

    /**
     * 予約情報の登録
     *
     * @param OnlineReserveConfirmFormRequest $request
     * @return RedirectResponse
     */
    public function confirm(OnlineReserveConfirmFormRequest $request): RedirectResponse
    {
        return $this->onlineReserveFormLogic->confirm($request);
    }

    /**
     * 予約完了
     *
     * @param Request $request
     * @return Renderable
     */
    public function complete(Request $request): Renderable
    {
        return view('online-reserve::complete')->with([
            'storeId' => $request->session()->get('reserve.store_id')
        ]);
    }

    /**
     * 予約失敗
     *
     * @param Request $request
     * @return Renderable
     */
    public function error(Request $request): Renderable
    {
        return view('online-reserve::error')->with([
            'storeId' => $request->session()->get('reserve.store_id')
        ]);
    }
}
